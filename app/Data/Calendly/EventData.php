<?php

namespace App\Data\Calendly;

use Spatie\LaravelData\Data;

class EventData extends Data
{
    public function __construct(
        // public readonly string $scheduling_url,
        // public readonly string $uri,
        public readonly mixed $meta
    ) {
    }
}
