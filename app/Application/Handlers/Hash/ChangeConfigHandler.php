<?php

namespace App\Application\Handlers\Hash;

use App\Application\Services\HashingService;
use App\Domain\Services\Logger;
use App\Kernel\Utilities\ApiResponse;
use Illuminate\Support\Facades\Cache;

class ChangeConfigHandler
{
    private HashingService $hashingService;

    private Logger $logger;

    public function __construct(HashingService $hashingService, Logger $logger)
    {
        $this->hashingService = $hashingService;
        $this->logger = $logger;
    }

    public function handle($command)
    {
        $this->logger->log("Configuration change started.");

        $data = $command->request->all();
        $driver = $data['driver'];
        $logger = $data['logger'];

        $this->setHash($driver);
        $this->setLogger($logger);

        $this->logger->log("Configurations updated successfully.");

        return ApiResponse::sendResponse([], "Configurations updated successfully.", 200);
    }

    private function setLogger($logger): void
    {
        Cache::put('logger', $logger);
    }

    private function setHash($driver): void
    {
        $this->hashingService->setDriver($driver);
    }

}
