<?php

namespace App\Constants;

enum TransactionTypes: string
{
    case CREDIT = 'credit';
    case DEBIT = 'debit';
    case WITHDRAWAL = 'withdrawal';
}
