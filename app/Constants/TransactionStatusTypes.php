<?php

namespace App\Constants;

use App\Traits\ArrayableEnum;
use App\Contracts\EnumToArray;

enum TransactionStatusTypes: string implements EnumToArray
{
    use ArrayableEnum;
    case PENDING = 'pending';
    case FAILED = 'failed';
    case CONFIRMED = 'comfirmed';

    public function labels()
    {
        return match ($this) {
            self::PENDING => "<span class ='badge bg-warning' > pending <i class='bx bx-repost'></i> </span>",
            self::FAILED => "<span class = 'badge bg-danger' >failed <i class='bx bx-x'></i></span>",
            self::CONFIRMED => "<span class = 'badge bg-success' >confirmed <i  class='bx bx-check'></i></span>"

        };
        
    }
}


