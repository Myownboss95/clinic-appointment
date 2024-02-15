<?php

namespace App\Http\Integrations\Calendly\Requests;

use App\Data\Calendly\FetchUserUriResponseData;
use App\Http\Integrations\Calendly\Connectors\BaseCalendlyConnector;
use App\Http\Integrations\Calendly\Connectors\BaseConnector;
use Saloon\Contracts\Body\HasBody;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Traits\Request\HasConnector;
use Saloon\Traits\RequestProperties\HasHeaders;

class ScheduledEventsRequest extends Request implements HasBody
{
    use AcceptsJson;
    use HasConnector;
    use HasHeaders;
    use HasJsonBody;

    /**
     * The connector class
     */
    public string $connector = BaseCalendlyConnector::class;

    /**
     * Define the HTTP method
     */
    protected Method $method = Method::GET;

    public function __construct()
    {
    }

    /**
     * Define the endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return "/scheduled_events/0cc8b2e2-65ff-4a83-bddf-6567264a06dd";
    }

    /**
     * Default Request Headers
     *
     * @return array<string, mixed>
     */
    protected function defaultHeaders(): array
    {
        // $token = $this->authTokenData->accessToken;

        // return [
        //     'authorization' => "Bearer $token",
        // ];
        return [];
    }

    public function defaultQuery(): array
    {
        return [
            // 'user' => "https://api.calendly.com/users/c1911e59-40e9-4510-96ad-e70029fcba2c",
            "uuid" => "0cc8b2e2-65ff-4a83-bddf-6567264a06dd"
        ];
    }

    public function defaultBody(): array
    {
        return [];
    }

    public function createDtoFromResponse(Response $response): FetchUserUriResponseData
    {
        return FetchUserUriResponseData::fromResponse($response);
    }
}
