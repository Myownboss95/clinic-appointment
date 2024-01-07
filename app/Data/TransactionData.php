<?php

namespace App\Data;

use App\Constants\TransactionReasons;
use App\Constants\TransactionStatusTypes;
use App\Constants\TransactionTypes;
use App\Models\PaymentChannel;
use App\Models\User;
use Spatie\LaravelData\Data;

class TransactionData extends Data
{
    public function __construct(
        public readonly float $amount,
        public readonly TransactionStatusTypes $status,
        public readonly TransactionTypes $type,
        public readonly User $user,
        public readonly PaymentChannel $channel,
        public readonly ?TransactionReasons $reason = TransactionReasons::NIL,
        public readonly ?User $confirmedBy = null
    ) {
    }
}
