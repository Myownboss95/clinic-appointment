<?php

namespace App\Constants;

use Illuminate\Support\Str;
use App\Traits\ArrayableEnum;
use App\Contracts\EnumToArray;
use App\Constants\PaymentChannelNames;

enum PaymentChannels: string implements EnumToArray
{
    use ArrayableEnum;

    case UBA = 'UBA';

    case KEYSTONE = 'keystone';

    case SYSTEM = 'system';

    public function name(): string
    {
        return match ($this) {
            self::UBA => PaymentChannelNames::BANK->value,
            self::KEYSTONE => PaymentChannelNames::BANK->value,
            self::SYSTEM => PaymentChannelNames::SYSTEM->value
        };
        
    }
    public function bank_name()
    {
        return $this->value;
        
    }
    public function account_number()
    {
        return match ($this) {
            self::UBA => "0596660757",
            self::KEYSTONE => "0024688049",
            self::SYSTEM => 1
        };
        
    }
    public function account_name()
    {
        return "Dental Clinic";
        return match ($this) {
            self::UBA => "Dental Clinic",
            self::KEYSTONE => "Dental Clinic",
            self::SYSTEM => "system"
        };
        
    }
}
