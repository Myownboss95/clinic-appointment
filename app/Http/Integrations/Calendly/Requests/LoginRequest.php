<?php

namespace App\Http\Integrations\Calendly\Requests;

use App\Data\Calendly\AuthTokenResponseData;
use App\Http\Integrations\Calendly\Connectors\BaseConnector;
use Saloon\Contracts\Body\HasBody;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Request\HasConnector;
use Saloon\Traits\RequestProperties\HasHeaders;

class LoginRequest extends Request implements HasBody
{
    use HasConnector;
    use HasHeaders;
    use HasJsonBody;

    /**
     * Define the HTTP method
     */
    protected Method $method = Method::POST;

    /**
     * The connector class
     */
    public string $connector = BaseConnector::class;

    /**
     * Define the endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return (string) config('services.calendly.calendly_oauth_url');
    }

    protected function defaultHeaders(): array
    {
        return [
            'accept' => 'text/plain',
        ];
    }

    /**
     * Default body
     *
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return [
            'clientId' => (string) config('services.Calendly.client_id'),
            'secret' => (string) config('services.Calendly.secret_key'),
        ];
    }

    public function createDtoFromResponse(Response $response): AuthTokenResponseData
    {
        return AuthTokenResponseData::fromResponse($response);
    }
}
