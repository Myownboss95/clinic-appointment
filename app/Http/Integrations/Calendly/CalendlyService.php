<?php

namespace App\Http\Integrations\Calendly;

use Exception;
use Illuminate\Support\Facades\Cache;
use App\Data\Calendly\EventTypeResponseData;
use App\Data\Calendly\AuthTokenResponseData;
use App\Exceptions\Calendly\BvnLookupFailedException;
use App\Exceptions\Calendly\IdentityMisMatchException;
use App\Http\Integrations\Calendly\Requests\LoginRequest;
use App\Exceptions\Calendly\FailedToGetAccessTokenException;
use App\Http\Integrations\Calendly\Connectors\BaseConnector;
use App\Http\Integrations\Calendly\Requests\EventTypesRequest;

class CalendlyService
{
    private function getAccessToken(): AuthTokenResponseData
    {
        $cacheKey = 'CalendlyAuthToken';

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $response = (new LoginRequest())->send();

        if (! $response->successful()) {
            throw new Exception($response->body());
        }

        /**
         * @var AuthTokenResponseData
         */
        $authTokenData = $response->dto();

        Cache::put($cacheKey, $authTokenData, 7000);

        return $authTokenData;
    }

    public function eventTypes()//: EventTypeResponseData
    {
        $connector = new BaseConnector();

        dd($connector);

        dd($connector->send(new EventTypesRequest()));
        return;
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
