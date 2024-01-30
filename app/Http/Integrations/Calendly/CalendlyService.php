<?php

namespace App\Http\Integrations\Calendly;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\Data\Calendly\AuthTokenResponseData;
use App\Data\Calendly\EventTypeResponseData;
use App\Http\Integrations\Calendly\Requests\LoginRequest;
use App\Http\Integrations\Calendly\Connectors\BaseConnector;
use App\Http\Integrations\Calendly\Requests\EventTypesRequest;
use App\Http\Integrations\Calendly\Connectors\BaseCalendlyConnector;

class CalendlyService
{
    // private function getAccessToken(): AuthTokenResponseData
    // {
    //     $cacheKey = 'CalendlyAuthToken';

    //     if (Cache::has($cacheKey)) {
    //         return Cache::get($cacheKey);
    //     }

    //     $response = (new LoginRequest())->send();

    //     if (! $response->successful()) {
    //         throw new Exception($response->body());
    //     }

    //     /**
    //      * @var AuthTokenResponseData
    //      */
    //     $authTokenData = $response->dto();

    //     Cache::put($cacheKey, $authTokenData, 7000);

    //     return $authTokenData;
    // }

    public function __construct(protected BaseConnector $connector)
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



    public function eventTypes()//: EventTypeResponseData
    {
        // $connector = new BaseConnector();
        $connector = new BaseCalendlyConnector();

        // dd($connector);

        dd($connector->send(new EventTypesRequest())->body());

        // $accessTokenData = $this->getAccessToken();
        // return info ($accessTokenData);

        // $response = (new EventTypesRequest($accessTokenData))->send();

        // if (! $response->successful()) {
        // }
        // $response->body();

        // /**
        //  * @var EventTypeResponseData
        //  */
        // $eventTypeResponseData = $response->dto();
        // info($eventTypeResponseData);
        // return $eventTypeResponseData;
    }
}
