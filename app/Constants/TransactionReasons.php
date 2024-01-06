<?php

namespace App\Constants;

use App\Contracts\EnumToArray;
use App\Traits\ArrayableEnum;

enum TransactionReasons: string implements EnumToArray
{
    use ArrayableEnum;

    case REFERRALS = 'Referral Bonus';
    case APPOINTMENT_BOOKING = 'Appointment Booking';

}
