<?php

namespace App\Providers;

use App\Domain\Repositories\LogRepository;
use App\Domain\Repositories\UserRepository;
use App\Infrastructure\Repositories\Log\LogRepositoryImpl;
use App\Infrastructure\Repositories\User\UserRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class RepositoryServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class, UserRepositoryImpl::class);
        $this->app->bind(LogRepository::class, LogRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
