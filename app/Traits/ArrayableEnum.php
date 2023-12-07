<?php

namespace App\Traits;

trait ArrayableEnum
{
    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
