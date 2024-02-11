<?php

namespace App\Exceptions;

use Exception;

class FailedToFetchUriException extends Exception
{
    public function __construct(protected string|array $responseData)
    {
        parent::__construct('Failed to Fetch URI');
    }

    public function context(): array
    {
        return [
            'response data' => $this->responseData,
        ];
    }
}
