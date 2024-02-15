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

class AddInviteesRequest extends Request implements HasBody
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
    protected Method $method = Method::POST;

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
            // "uuid" => "0cc8b2e2-65ff-4a83-bddf-6567264a06dd"
        ];
    }

    public function defaultBody(): array
    {
        return [
    'resource' => [
        'calendar_event' => [
            'external_id' => 'utvmotr2itp0pu6rneg9hg78lc',
            'kind' => 'google',
        ],
        'created_at' => '2024-02-12T17:18:26.494869Z',
        'end_time' => '2024-02-13T10:00:00.000000Z',
        'event_guests' => [], // This can be kept empty
        'event_memberships' => [
            [
                'user' => 'https://api.calendly.com/users/c1911e59-40e9-4510-96ad-e70029fcba2c',
                'user_email' => 'tobeodiachi2014@gmail.com',
                'user_name' => 'Odiachi Daniel',
            ],
        ],
        'event_type' => 'https://api.calendly.com/event_types/f77e6970-59de-4ef5-8bf0-db55718dc991',
        'invitees_counter' => [
            'active' => 1,
            'limit' => 1,
            'total' => 1,
        ],
        'location' => [
            'location' => 'My Clinic',
            'type' => 'physical',
        ],
        'name' => 'Appointments',
        'start_time' => '2024-02-13T09:00:00.000000Z',
        'status' => 'active',
        'updated_at' => '2024-02-12T17:18:28.103251Z',
        'uri' => 'https://api.calendly.com/scheduled_events/0cc8b2e2-65ff-4a83-bddf-6567264a06dd',
        "invitees" => [ // Place the invitees array here
            "email" => "tobeodiachi@yahoo.com",
            "firstName" => "John",
            "lastName" => "John"
        ]
    ]
];

    }

    public function createDtoFromResponse(Response $response): FetchUserUriResponseData
    {
        return FetchUserUriResponseData::fromResponse($response);
    }
}
