<?php

namespace App\Application\Services\Logger;

use App\Domain\Services\Logger;
use Illuminate\Support\Facades\Storage;

class FileLogger implements Logger
{

    public function log(string $message): void
    {
        $fileName = 'logs.txt';
        $logMessage = '[' . now() . '] ' . $message;

        Storage::disk('local')->append($fileName, $logMessage);
    }
}
