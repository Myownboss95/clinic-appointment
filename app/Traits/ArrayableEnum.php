<?php

namespace App\Traits;

trait ArrayableEnum
{
    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
    public function equals(\BackedEnum|string $enumValue): bool
    {
        if (is_string($enumValue)) {
            return self::tryFrom($enumValue) === $this;
        }

        return $enumValue === $this;
    }

}
