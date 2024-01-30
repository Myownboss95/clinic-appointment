<?php

namespace App\Http\Integrations\Calendly\Connectors;

use DateTimeImmutable;
use Saloon\Contracts\OAuthAuthenticator;
use Saloon\Contracts\Response;
use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Traits\OAuth2\AuthorizationCodeGrant;
use Saloon\Traits\Plugins\AcceptsJson;

class BaseConnector extends Connector
{
    use AcceptsJson;
    use AuthorizationCodeGrant;

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return 'https://auth.calendly.com';
    }

    /**
     * Default headers for every request
     *
     * @return string[]
     */
    protected function defaultHeaders(): array
    {
        return [];
    }

    protected function defaultOauthConfig(): OAuthConfig
    {
        return OAuthConfig::make()
            ->setClientId(config('services.calendly.client_id'))
            ->setClientSecret(config('services.calendly.client_secret'))
        ->setRedirectUri(route('admin.settings.calendly.redirect'))
        ->setAuthorizeEndpoint('/oauth/authorize')
        ->setTokenEndpoint('/oauth/token');

    }

    // protected function createOAuthAuthenticatorFromResponse(Response $response, ?string $fallbackRefreshToken = null): OAuthAuthenticator
    // {
    //     dd($response->json());
    // }

    // protected function createOAuthAuthenticator(string $accessToken, string $refreshToken, ?DateTimeImmutable $expiresAt = null): OAuthAuthenticator
    // {
    //     dd($accessToken, $refreshToken);

    // }

    /**
     * Default HTTP client options
     *
     * @return string[]
     */
    protected function defaultConfig(): array
    {
        return [];
    }
}
