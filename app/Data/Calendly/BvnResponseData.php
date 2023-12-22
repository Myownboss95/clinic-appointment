<?php

namespace App\Data\Calendly;

use Saloon\Contracts\Response;
use Spatie\LaravelData\Data;

class BvnResponseData extends Data
{
    public function __construct(
        public readonly string $bvn,
        public readonly string $phone,
        public readonly string $watchListed,
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        $data = (array) $response->json();
        $bvn = $data['bvn'];

        return new self($bvn['bvn'], $bvn['phone'], $bvn['watch_listed']);
    }
}
