<?php

namespace App\Data;

use App\Models\User;
use Spatie\LaravelData\Data;

class CreateUserResponseData extends Data
{
    public function __construct(
        public readonly User $user,
        public readonly bool $status,

    ) {
    }
}
