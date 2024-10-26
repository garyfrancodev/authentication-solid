<?php

namespace App\Application\Services\Logger;

use App\Domain\Repositories\LogRepository;
use App\Domain\Services\Logger;

class DbLogger implements Logger
{
    private LogRepository $logRepository;

    /**
     * @param LogRepository $logRepository
     */
    public function __construct(LogRepository $logRepository)
    {
        $this->logRepository = $logRepository;
    }


    public function log(string $message): void
    {
        $data = [
            "message" => $message
        ];

        $this->logRepository->store($data);
    }
}
