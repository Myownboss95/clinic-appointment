<?php

namespace App\Constants;

use Illuminate\Support\Str;
use App\Traits\ArrayableEnum;
use App\Contracts\EnumToArray;

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
