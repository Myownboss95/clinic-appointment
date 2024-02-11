<?php

namespace App\Data\Calendly;

use Saloon\Contracts\Response;
use Spatie\LaravelData\Data;

class FetchUserUriResponseData extends Data
{
    public function __construct(
        public readonly string $organization,
        public readonly string $email,
        public readonly string $user_uri
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        $data = $response->json('resource');

        return new self(
            $data['current_organization'],
            $data['email'],
            $data['uri']
        );
    }
}
