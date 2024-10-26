<?php

namespace App\Infrastructure\Repositories\Log;

use App\Domain\Repositories\LogRepository;
use App\Models\Log;

class LogRepositoryImpl implements LogRepository
{

    public function findById(string $id)
    {
        return Log::findOrFails($id);
    }

    public function store($data)
    {
        return Log::create($data);
    }
}
