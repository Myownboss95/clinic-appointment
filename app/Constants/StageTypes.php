<?php

namespace App\Constants;

use App\Contracts\EnumToArray;
use App\Traits\ArrayableEnum;
use Illuminate\Support\Str;

enum StageTypes: string implements EnumToArray
{
    use ArrayableEnum;

    case PENDING = 'pending';
    case DIAGNOSTICS = 'diagnostics';
    case PROCEDURES = 'procedures';
    case COMPLETED = 'completed';
    case POST_TREATMENT = 'post treatment';
    case FOLLOW_UP_APPOINTMENT = 'follow up appointments';

    public function slug()
    {
        return Str::slug($this->value);
    }
}
