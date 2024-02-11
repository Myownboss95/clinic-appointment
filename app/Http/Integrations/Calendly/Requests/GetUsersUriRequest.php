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

class GetUsersUriRequest extends Request implements HasBody
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
        return "/users/me";
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
        return [];
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
