<?php

namespace App\Data\Calendly;

use Saloon\Contracts\Response;
use Spatie\LaravelData\Data;

class EventTypeResponseData extends Data
{
    public function __construct(
        public readonly array $data
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        $data = $response->json();
        // $test = $data['test'];

        return new self($data);
    }
}
