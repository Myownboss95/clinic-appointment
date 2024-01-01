<?php

namespace App\Constants;

enum TransactionTypes: string
{
    case CREDIT = 'credit';
    case DEBIT = 'debit';

    public function labels()
    {
        return match ($this) {
            self::CREDIT => "<i data-feather='arrow-down-left' class='text-success'></i><span class = 'badge bg-success' >Credit</span>'",
            self::DEBIT => "<i data-feather='arrow-down-left' class='text-danger'></i><span class = 'badge bg-secondary' >Debit</span>'",
        };

    }
}
