<?php

namespace App\Http\Controllers;

use App\Application\Commands\Auth\CreateUserCommand;
use App\Application\Commands\Auth\LoginUserCommand;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Kernel\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $command = new CreateUserCommand($request);
        return $this->mediator->send($command);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $command = new LoginUserCommand($request);
        return $this->mediator->send($command);
    }
}
