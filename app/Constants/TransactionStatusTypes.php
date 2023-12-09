<?php

namespace App\Constants;

use App\Traits\ArrayableEnum;
use App\Contracts\EnumToArray;

enum TransactionStatusTypes: string implements EnumToArray
{
    use ArrayableEnum;
    case PENDING = 'pending';
    case FAILED = 'failed';
    case CONFIRMED = 'comfirmed';
}
