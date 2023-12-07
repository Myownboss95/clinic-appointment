<?php

namespace App\Constants;

use App\Contracts\EnumToArray;
use App\Traits\ArrayableEnum;

enum SubServicesTypes: string implements EnumToArray
{
    use ArrayableEnum;

    case TEETH_WHITENING = 'teeth whitening';

    case BRACES = 'braces';

    case DENTURE = 'denture';

    case POLISHING = 'polishing';

    public function slug()
    {
        return match ($this) {
            self::TEETH_WHITENING => 'teeth-whitening',
            self::BRACES => 'braces',
            self::DENTURE => 'denture',
            self::POLISHING => 'polishing',
        };
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
