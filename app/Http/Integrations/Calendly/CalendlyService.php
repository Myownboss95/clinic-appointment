<?php

namespace App\Http\Integrations\Calendly;

use Amp\Serialization\Serializer;
use Exception;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\Data\Calendly\AuthTokenResponseData;
use App\Data\Calendly\EventTypeResponseData;
use App\Http\Integrations\Calendly\Requests\LoginRequest;
use App\Http\Integrations\Calendly\Connectors\BaseConnector;
use App\Http\Integrations\Calendly\Requests\EventTypesRequest;
use App\Http\Integrations\Calendly\Connectors\BaseCalendlyConnector;
use Saloon\Http\Auth\AccessTokenAuthenticator;

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
        if ($authenticator->hasNotExpired()) {
            return $authenticator;
        }

        $authenticator = $this->refreshAccessToken($authenticator);


        $settings = app(GeneralSettings::class);
        $settings->calendly = serialize($authenticator);
        $settings->save();

        return $authenticator;
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

    public function eventTypes()//: EventTypeResponseData
    {
        // $connector = new BaseConnector();
        $accessTokenData = $this->fetchAccessToken();

        $connector = new BaseCalendlyConnector();

        // $connector->headers()->add('Auththorization', "Bearer $accessTokenData->accessToken");

        $response = $connector->authenticate($accessTokenData)->send(new EventTypesRequest);

        // $request = new EventTypesRequest();


        // $response = $connector->send($request);

        dd($response->json());



        // dd($connector->send(new EventTypesRequest())->body());

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
