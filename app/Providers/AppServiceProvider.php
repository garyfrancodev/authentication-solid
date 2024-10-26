<?php

namespace App\Providers;

use App\Application\Services\HashingService;
use App\Application\Services\Logger\DbLogger;
use App\Application\Services\Logger\FileLogger;
use App\Application\Services\Logger\SDHttpLogger;
use App\Domain\Repositories\LogRepository;
use App\Domain\Services\Logger;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(HashingService::class, function ($app) {
            return new HashingService();
        });

        $this->app->singleton(Logger::class, function ($app) {
            return $this->getLogger();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    private function getLogger(): Logger
    {
        $logger = Cache::get('logger');

        switch ($logger) {
            case 'database':
                $logRepository = app(LogRepository::class);
                return new DbLogger($logRepository);
            case 'sdhttp':
                return new SDHttpLogger();
            default:
                return new FileLogger();
        }
    }
}
