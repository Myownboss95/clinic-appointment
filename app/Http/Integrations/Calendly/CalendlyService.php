<?php

namespace App\Http\Integrations\Calendly;

use Exception;
use Amp\Serialization\Serializer;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\Data\Calendly\AuthTokenResponseData;
use App\Data\Calendly\EventTypeResponseData;
use App\Exceptions\FailedToFetchUriException;
use Saloon\Http\Auth\AccessTokenAuthenticator;
use App\Data\Calendly\FetchUserUriResponseData;
use App\Exceptions\FailedToFetchEventException;
use App\Http\Integrations\Calendly\Requests\LoginRequest;
use App\Http\Integrations\Calendly\Connectors\BaseConnector;
use App\Http\Integrations\Calendly\Requests\EventTypesRequest;
use App\Http\Integrations\Calendly\Requests\GetUsersUriRequest;
use App\Http\Integrations\Calendly\Connectors\BaseCalendlyConnector;

class CalendlyService
{

    public function __construct(protected ?BaseConnector $connector = null)
    {
    }

    public function getRedirectUrl()
    {
        Session::put('calendlyState', $this->connector->getState());

        return urldecode($this->connector->getAuthorizationUrl());
    }

    protected function getExpectedState(): ?string
    {
        return Session::pull('calendlyState');
    }

    public function refreshAccessToken(\Saloon\Contracts\OAuthAuthenticator $authenticator)
    {
        return $authenticator->hasNotExpired()
            ? $authenticator
            : $this->connector->refreshAccessToken($authenticator);
    }

    public function getAccessToken(string $code, string $state)
    {
        return $this->connector->getAccessToken($code, $state, $this->getExpectedState());
    }

    protected function fetchAccessToken()
    {
        $settings = app(GeneralSettings::class);
        $auth = new AccessTokenAuthenticator($settings->calendly_access_token, $settings->calendly_refresh_token, $settings->calendly_expires_at);
        return $this->refreshAccessToken($auth);
    }

    public function eventTypes() //: EventTypeResponseData
    {
        $accessTokenData = $this->fetchAccessToken();

        $connector = new BaseCalendlyConnector();

        $response = $connector->authenticate($accessTokenData)->send(new EventTypesRequest);

        if ($response->failed()) {
            throw new FailedToFetchEventException($response->body());
        }
        // return $response->dto();

        return $response->json('collection');
    }
    public function fetchUserURI() //: FetchUserUriResponseData
    {
        $accessTokenData = $this->fetchAccessToken();

        $connector = new BaseCalendlyConnector();

        $response = $connector->authenticate($accessTokenData)->send(new GetUsersUriRequest);

        if ($response->failed()) {
            throw new FailedToFetchUriException($response->body());
        }

        return $response->json();
    }
}
