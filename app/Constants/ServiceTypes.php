<?php

namespace App\Constants;

use App\Contracts\EnumToArray;
use App\Traits\ArrayableEnum;

enum ServiceTypes: string implements EnumToArray
{
    use ArrayableEnum;

    case DENTALS = 'dentals';

    case GRILLS = 'grills';

    public function slug()
    {
        return match ($this) {
            self::DENTALS => 'dental-services',
            self::GRILLS => 'grill-services',
        };
    }
}
