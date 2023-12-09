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
        return Str::slug($this->value);
    }
}
