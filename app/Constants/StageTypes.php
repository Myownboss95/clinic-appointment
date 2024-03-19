<?php

namespace App\Constants;

use App\Contracts\EnumToArray;
use App\Traits\ArrayableEnum;
use Illuminate\Support\Str;

enum StageTypes: string implements EnumToArray
{
    use ArrayableEnum;

    case PENDING = 'pending';
    case CONSULTATION = 'consultation';
    case DIAGNOSTICS = 'diagnostics';
    case PROCEDURES = 'procedures';
    case COMPLETED = 'completed';
    case POST_TREATMENT = 'post treatment';
    case FOLLOW_UP_APPOINTMENT = 'follow up appointments';


    public function slug()
    {
        return Str::slug($this->value);
    }
    public function labels()
    {
        return match ($this) {
            self::PENDING => "<span class ='badge bg-warning p-2' > $this->value  </span>",
            self::DIAGNOSTICS => "<span class = 'badge bg-info p-2' >$this->value </span>",
            self::PROCEDURES => "<span class = 'badge bg-light p-2' >$this->value </span>",
            self::COMPLETED => "<span class = 'badge bg-success p-2' >$this->value </span>",
            self::POST_TREATMENT => "<span class = 'badge bg-secondary p-2' >$this->value </span>",
            self::FOLLOW_UP_APPOINTMENT => "<span class = 'badge bg-primary p-2' >$this->value ",
            self::CONSULTATION => "<span class = 'badge bg-primary p-2' >$this->value"
        };
    }
}
