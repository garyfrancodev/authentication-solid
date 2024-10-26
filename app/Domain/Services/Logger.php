<?php

namespace App\Domain\Services;

interface Logger
{
    public function log(string $message): void;
}
