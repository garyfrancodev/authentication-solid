<?php

namespace App\Application\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class HashingService
{
    protected string $driver;

    public function __construct()
    {
        $this->driver = Cache::get('hashing_driver', 'bcrypt');
        $this->setDriver($this->driver);

        error_log("HashingService instantiated with driver: {$this->driver}");
    }

    public function setDriver(string $driver): void
    {
        if (!in_array($driver, ['bcrypt', 'argon', 'argon2id'])) {
            throw new \InvalidArgumentException("Unsupported hash driver: {$driver}");
        }

        Cache::put('hashing_driver', $driver);

        $this->driver = $driver;
        error_log("Driver set to: $driver");
    }

    public function hash(string $password): string
    {
        error_log("Hashing password with driver: {$this->driver}");
        return Hash::driver($this->driver)->make($password);
    }

    public function verify(string $password, string $hashedPassword): bool
    {
        error_log("Verifying password with driver: {$this->driver}");
        return Hash::driver($this->driver)->check($password, $hashedPassword);
    }

    public function getDriver(): string
    {
        return $this->driver;
    }

}
