<?php

namespace App\Application\Handlers\Auth;

use App\Application\Services\HashingService;
use App\Domain\Entities\User;
use App\Domain\Repositories\UserRepository;
use App\Domain\Services\Logger;
use App\Kernel\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class CreateUserHandler
{
    private UserRepository $userRepository;
    private HashingService $hashingService;

    private Logger $logger;


    /**
     * @param UserRepository $userRepository
     * @param HashingService $hashingService
     * @param Logger $logger
     */
    public function __construct(UserRepository $userRepository, HashingService $hashingService, Logger $logger)
    {
        $this->userRepository = $userRepository;
        $this->hashingService = $hashingService;
        $this->logger = $logger;
    }

    public function handle($command): JsonResponse
    {
        try {
            $this->logger->log("User registration started.");

            $data = $command->registerRequest->all();
            $password = $this->hashingService->hash($data['password']);

            $user = new User($data['name'], $data['email'], $password);

            $this->userRepository->store($user);

            $this->logger->log("User registered successfully.");

            return ApiResponse::sendResponse([], "User registered successfully.", 201);
        } catch (\Throwable $e) {
            $this->logger->log($e->getMessage());
            return ApiResponse::sendResponse([], $e->getMessage(), 500);
        }

    }
}
