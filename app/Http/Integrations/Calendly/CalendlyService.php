<?php

namespace App\Http\Integrations\Calendly;

use App\Data\Calendly\AuthTokenResponseData;
use App\Data\Calendly\BvnResponseData;
use App\Exceptions\Calendly\BvnLookupFailedException;
use App\Exceptions\Calendly\FailedToGetAccessTokenException;
use App\Exceptions\Calendly\IdentityMisMatchException;
use App\Http\Integrations\Calendly\Requests\BvnLookUpRequest;
use App\Http\Integrations\Calendly\Requests\LoginRequest;
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
            // throw new FailedToGetAccessTokenException($response->body());
        }

        /**
         * @var AuthTokenResponseData
         */
        $authTokenData = $response->dto();

        Cache::put($cacheKey, $authTokenData, 7000);

        return $authTokenData;
    }

    public function lookUpBvn(string $bvn, string $firstName, string $lastName): BvnResponseData
    {
        $accessTokenData = $this->getAccessToken();

        $response = (new BvnLookUpRequest($accessTokenData, $bvn, $firstName, $lastName))->send();

        if (! $response->successful()) {
            // throw new BvnLookupFailedException($response->body());
        }

        if ($response->json('status')['status'] == 'id_mismatch') {
            // throw new IdentityMisMatchException($response->body());
        }

        /**
         * @var BvnResponseData
         */
        $bvnResponseData = $response->dto();

        return $bvnResponseData;
    }
}
