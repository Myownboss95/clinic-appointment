<?php

namespace App\Constants;

use App\Traits\ArrayableEnum;
use App\Contracts\EnumToArray;

enum PaymentChannelNames: string implements EnumToArray
{
    use ArrayableEnum;

    case BANK = 'bank';
    case SYSTEM = 'system';
}
