<?php

namespace App\Constants;

use App\Contracts\EnumToArray;
use App\Traits\ArrayableEnum;

enum EventStatus: string implements EnumToArray
{
    use ArrayableEnum;

    case ACTIVE = 'active';

    case INACTIVE = 'inactive';
}
