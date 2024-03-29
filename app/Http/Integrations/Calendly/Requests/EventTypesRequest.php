<?php

namespace App\Http\Integrations\Calendly\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;
use App\Settings\GeneralSettings;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Traits\Request\HasConnector;
use App\Data\Calendly\EventTypeResponseData;
use Saloon\Traits\RequestProperties\HasHeaders;
use App\Http\Integrations\Calendly\Connectors\BaseConnector;
use App\Http\Integrations\Calendly\Connectors\BaseCalendlyConnector;

class EventTypesRequest extends Request implements HasBody
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
        return '/event_types';
    }

    /**
     * Default Request Headers
     *
     * @return array<string, mixed>
     */
    protected function defaultHeaders(): array
    {
        return [];
    }

    public function defaultQuery(): array
    {
        $settings = app(GeneralSettings::class);
        return [
            "active" => true,
            "admin_managed" => false,
            "organization" => $settings->calendly_organisation,
        ];
    }

    public function defaultBody(): array
    {
        return [
        ];
    }

    public function createDtoFromResponse(Response $response): EventTypeResponseData
    {
        return EventTypeResponseData::fromResponse($response);
    }
}
