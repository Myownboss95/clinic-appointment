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

    public function name(): string
    {
        return PaymentChannelNames::BANK->value;
        
    }
    public function bank_name()
    {
        return $this->value;
        
    }
    public function account_number()
    {
        return match ($this) {
            self::UBA => "0596660757",
            self::KEYSTONE => "0024688049"
        };
        
    }
    public function account_name()
    {
        return "Dental Clinic";
        
    }
}
