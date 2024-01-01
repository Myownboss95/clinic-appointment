<?php

namespace App\Http\Integrations\Calendly;

use App\Data\Calendly\AuthTokenResponseData;
use App\Data\Calendly\EventTypeResponseData;
use App\Http\Integrations\Calendly\Connectors\BaseConnector;
use App\Http\Integrations\Calendly\Requests\EventTypesRequest;
use App\Http\Integrations\Calendly\Requests\LoginRequest;
use Exception;
use Illuminate\Support\Facades\Cache;

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
