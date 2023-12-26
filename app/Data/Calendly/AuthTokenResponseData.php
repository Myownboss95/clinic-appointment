<?php

namespace App\Data\Calendly;

use Saloon\Contracts\Response;
use Spatie\LaravelData\Data;

class AuthTokenResponseData extends Data
{
    public function __construct(
        public readonly string $accessToken,
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        $responseJson = $response->body();

        return new self($responseJson);
    }
}
