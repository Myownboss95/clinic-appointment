<?php

namespace App\Actions;

use App\Constants\TransactionStatusTypes;
use App\Constants\TransactionTypes;
use App\Data\TransactionData;
use App\Models\PaymentChannel;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class SaveReferralCreditTransactionAction
{
    //needs reimplementation using DTOs
    public static function execute(TransactionData $transactionData)
    {

        DB::beginTransaction();
        try {
            $transactionData->user->increment('balance', $transactionData->amount);
            $transactionData->user->increment('life_time_balance', $transactionData->amount);
            $transactionData->user->save();

            $transactionData->user->transactions()->create([
                'amount' => $transactionData->amount,
                'payment_channel_id' => $transactionData->channel->id,
                'status' => $transactionData->status,
                'type' => TransactionTypes::CREDIT->value,
                'reason' => $transactionData->reason,
            ]);
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            throw new Exception('Failed to save transaction Details');
        }
    }
}
