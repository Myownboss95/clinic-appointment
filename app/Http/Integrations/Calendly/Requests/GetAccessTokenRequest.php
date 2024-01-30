<?php

namespace App\Http\Integrations\Calendly\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

class GetAccessTokenRequest extends Request implements HasBody
{
    use HasMultipartBody;

    /**
     * Define the HTTP method
     *
     * @var Method
     */
    protected Method $method = Method::POST;

    public function __construct(protected string $code)
    {
        //
    }

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/oauth/token';
    }

    public function defaultBody(): array
    {
        return [
            'code' => $this->code
        ];
    }
}
