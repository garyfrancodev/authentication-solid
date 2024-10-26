<?php

namespace App\Application\Commands\Auth;

use App\Http\Requests\RegisterRequest;

class CreateUserCommand
{
    public RegisterRequest $registerRequest;

    public function __construct($registerRequest)
    {
        $this->registerRequest = $registerRequest;
    }
}
