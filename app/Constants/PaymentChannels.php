<?php

namespace App\Constants;

use App\Contracts\EnumToArray;
use App\Traits\ArrayableEnum;

enum PaymentChannels: string implements EnumToArray
{
    use ArrayableEnum;

    case UBA = 'UBA';

    case KEYSTONE = 'keystone';

    case ADMIN = 'Admin';

    public function name(): string
    {
        return match ($this) {
            self::UBA => PaymentChannelNames::BANK->value,
            self::KEYSTONE => PaymentChannelNames::BANK->value,
            self::ADMIN => PaymentChannelNames::ADMIN->value
        };

    }

    public function bank_name()
    {
        return $this->value;

    }

    public function account_number()
    {
        return match ($this) {
            self::UBA => '0596660757',
            self::KEYSTONE => '0024688049',
            self::ADMIN => 1
        };

    }

    public function account_name()
    {
        return config('app.name');

        return match ($this) {
            self::UBA => config('app.name'),
            self::KEYSTONE => config('app.name'),
            self::ADMIN => 'Admin'
        };

    }
}
