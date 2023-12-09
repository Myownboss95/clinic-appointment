<?php

namespace App\Constants;

use Illuminate\Support\Str;
use App\Traits\ArrayableEnum;
use App\Contracts\EnumToArray;

enum SubServicesTypes: string implements EnumToArray
{
    use ArrayableEnum;

    case TEETH_WHITENING = 'teeth whitening';

    case BRACES = 'braces';

    case DENTURE = 'denture';

    case POLISHING = 'polishing';

    public function slug()
    {
        return Str::slug("$this->value services");
    }

    public function service()
    {
        return match ($this) {
            self::TEETH_WHITENING => ServiceTypes::DENTALS->value,
            self::BRACES => ServiceTypes::GRILLS->value,
            self::DENTURE => ServiceTypes::GRILLS->value,
            self::POLISHING => ServiceTypes::DENTALS->value,
        };
    }
    public function price()
    {
        return match ($this) {
            self::TEETH_WHITENING => 20000.00,
            self::BRACES => 100000.00,
            self::DENTURE => 200000.00,
            self::POLISHING => 50000.00,
        };
    }

    public function description()
    {
        return match ($this) {
            self::TEETH_WHITENING => "Lightens teeth color and removes stains for a brighter smile.",
            self::BRACES => "Orthodontic devices to align teeth and correct bite issues.",
            self::DENTURE => "Removable prosthetics to replace missing teeth.",
            self::POLISHING => "Procedure to remove stains and plaque for cleaner teeth.",
        };
    }
}
