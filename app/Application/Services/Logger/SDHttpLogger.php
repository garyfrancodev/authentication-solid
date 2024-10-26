<?php

namespace App\Application\Services\Logger;

use App\Domain\Services\Logger;
use Illuminate\Support\Facades\Http;

class SDHttpLogger implements Logger
{

    public function log(string $message): void
    {
        error_log("SDHttpLogger: $message");
        Http::get("http://www.sd-bo.com/log.php", ['log_value' => $message]);
    }
}
