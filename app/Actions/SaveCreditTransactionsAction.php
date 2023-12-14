<?php

namespace App\Actions;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Constants\TransactionTypes;
use App\Constants\TransactionStatusTypes;
use App\Models\PaymentChannel;

class SaveCreditTransactionsAction
{
    //needs reimplementation using DTOs
    public static function execute(User $user, PaymentChannel $payment_channel, int $amount, string $reason ='')
    {

        DB::beginTransaction();
        try {
            $user->increment('balance', $amount);
            $user->increment('life_time_balance', $amount);
            $user->save();

            $user->transactions()->create([
                'amount' => $amount,
                'payment_channel_id' => $payment_channel->id,
                'status' => TransactionStatusTypes::CONFIRMED->value, 
                'type' => TransactionTypes::CREDIT->value,
                'reason' => $reason,
            ]);
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            throw new Exception('Failed to save transaction Details');
        }
    }

}
