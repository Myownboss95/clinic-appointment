<?php

namespace App\Data\Calendly;

use App\Models\SubService;
use Spatie\LaravelData\Data;

class CalendlyRedirectData extends Data
{
    public function __construct(
        public readonly string $startTime,
        public readonly string $lastName,
        public readonly string $firstName,
        public readonly string $email,
        public readonly string $phone_number,
        public readonly SubService $subService,

    ) {
    }
}
