<?php

namespace App\Constants;

use Illuminate\Support\Str;
use App\Traits\ArrayableEnum;
use App\Contracts\EnumToArray;

enum StageTypes: string implements EnumToArray
{
    use ArrayableEnum;

    case CONSULTATION = 'consultation';
    case APPOINTMENT_SCHEDULING = 'appointment scheduling';
    case DIAGNOSTICS = 'diagnostics';
    case PROCEDURES = 'procedures';
    case POST_TREATMENT = 'post treatment';
    case FOLLOW_UP_APPOINTMENT = 'follow up appointments';

    public function slug()
    {
        return match ($this) {
            self::CONSULTATION => Str::slug(self::CONSULTATION->value),
            self::APPOINTMENT_SCHEDULING => Str::slug(self::APPOINTMENT_SCHEDULING->value),
            self::DIAGNOSTICS => Str::slug(self::DIAGNOSTICS->value),
            self::PROCEDURES => Str::slug(self::PROCEDURES->value),
            self::POST_TREATMENT => Str::slug(self::POST_TREATMENT->value),
            self::FOLLOW_UP_APPOINTMENT => Str::slug(self::FOLLOW_UP_APPOINTMENT->value),
        };
    }
}
