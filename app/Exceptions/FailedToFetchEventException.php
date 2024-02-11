<?php

namespace App\Exceptions;

use Exception;

class FailedToFetchEventException extends Exception
{
    public function __construct(protected string|array $responseData)
    {
        parent::__construct('Failed to Fetch events');
    }

    public function context(): array
    {
        return [
            'response data' => $this->responseData,
        ];
    }
}
