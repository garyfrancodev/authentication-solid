<?php

namespace App\Application\Handlers\Auth;

use App\Domain\Services\Logger;
use App\Kernel\Utilities\ApiResponse;

class LoginUserHandler
{
    private Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function handle($command)
    {
        $this->logger->log("User login started.");

        $loginRequest = $command->getLoginRequest();
        $credentials = $loginRequest->only('email', 'password');

        if (!auth()->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = auth()->user();
        $token = $user->id;

        $this->logger->log("User logged in successfully.");

        return ApiResponse::sendResponse(['token' => $token], "User logged in successfully.", 200);
    }
}
