<?php

namespace App\Constants;

use App\Contracts\EnumToArray;
use App\Traits\ArrayableEnum;

enum TransactionStatusTypes: string implements EnumToArray
{
    use ArrayableEnum;
    case PENDING = 'pending';
    case FAILED = 'failed';
    case CONFIRMED = 'comfirmed';
    case PAID_REFERRAL = 'Paid Referral';

    public function labels()
    {
        return match ($this) {
            self::PENDING => "<span class ='badge bg-warning' > pending <i class='bx bx-repost'></i> </span>",
            self::FAILED => "<span class = 'badge bg-danger' >failed <i class='bx bx-x'></i></span>",
            self::CONFIRMED => "<span class = 'badge bg-success' >confirmed <i  class='bx bx-check'></i></span>",
            self::PAID_REFERRAL => "<span class = 'badge bg-primary' >Paid Referral <i  class='bx bx-check'></i></span>"

        };

    }
}
