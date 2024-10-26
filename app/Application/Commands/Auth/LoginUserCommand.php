<?php

namespace App\Application\Commands\Auth;

use App\Http\Requests\LoginRequest;

class LoginUserCommand
{
    private LoginRequest $loginRequest;

    public function __construct(LoginRequest $loginRequest)
    {
        $this->loginRequest = $loginRequest;
    }

    public function getLoginRequest(): LoginRequest
    {
        return $this->loginRequest;
    }

}
