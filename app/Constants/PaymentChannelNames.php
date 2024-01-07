<?php

namespace App\Constants;

use App\Contracts\EnumToArray;
use App\Traits\ArrayableEnum;

enum PaymentChannelNames: string implements EnumToArray
{
    use ArrayableEnum;

    case BANK = 'bank';
    case ADMIN = 'admin';
}
