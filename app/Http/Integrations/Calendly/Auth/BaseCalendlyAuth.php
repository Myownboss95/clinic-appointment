<?php

namespace App\Http\Integrations\Calendly\Auth;

use Saloon\Contracts\Authenticator;
use Saloon\Contracts\PendingRequest;

class BaseCalendlyAuth implements Authenticator
{
    public function __construct()
    {
        //
    }

    /**
     * Apply the authentication to the request.
     *
     * @param PendingRequest $pendingRequest
     * @return void
     */
    public function set(PendingRequest $pendingRequest): void
    {
        $token = base64_encode(config('services.calendly.client_id') . ':' . config('services.calendly.client_secret'));

        $pendingRequest->headers()->add('Authorization', "Basic $token");
    }
}
