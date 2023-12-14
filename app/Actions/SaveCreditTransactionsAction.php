<?php

namespace App\Actions;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Constants\TransactionTypes;
use App\Constants\TransactionStatusTypes;

class SaveCreditTransactionsAction
{
    //needs reimplementation using DTOs
    public static function execute(User $user, int $amount, string $reason ='')
    {

        DB::beginTransaction();
        try {
            $user->increment('balance', $amount);
            $user->increment('life_time_balance', $amount);
            $user->save();

            $user->transactions()->create([
                'amount' => $amount,
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
