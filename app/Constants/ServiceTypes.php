<?php

namespace App\Constants;

use App\Contracts\EnumToArray;
use App\Traits\ArrayableEnum;
use Illuminate\Support\Str;

enum ServiceTypes: string implements EnumToArray
{
    use ArrayableEnum;

    case DENTALS = 'dentals';

    case GRILLS = 'grills';

    public function slug()
    {
        return Str::slug("$this->value services");

    }
}
