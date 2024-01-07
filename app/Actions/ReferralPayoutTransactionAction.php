<?php

namespace App\Actions;

use App\Data\TransactionData;
use App\Notifications\PayoutReferralNotification;
use Exception;
use Illuminate\Support\Facades\DB;

class ReferralPayoutTransactionAction
{
    public static function execute(TransactionData $transactionData)
    {

        DB::beginTransaction();
        try {
            $transactionData->user->decrement('balance', $transactionData->amount);
            $transactionData->user->save();

            $transactionData->user->transactions()->create([
                'amount' => $transactionData->amount,
                'payment_channel_id' => $transactionData->channel->id,
                'status' => $transactionData->status,
                'type' => $transactionData->type,
                'reason' => $transactionData->reason,
                'confirmed_by' => $transactionData->confirmedBy->id,
            ]);

            $transactionData->user->notify((new PayoutReferralNotification($transactionData->user, $transactionData->amount))->afterCommit());
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            throw new Exception('Failed to save transaction Details');
        }
    }
}
