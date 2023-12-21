<?php

namespace App\Constants;

use Illuminate\Support\Str;
use App\Traits\ArrayableEnum;
use App\Contracts\EnumToArray;

enum TransactionReasons: string implements EnumToArray
{
    use ArrayableEnum;

    case REFERRALS = 'Referral Bonus';

    
}
