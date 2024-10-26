<?php

namespace App\Providers;

use App\Application\Commands\Auth\CreateUserCommand;
use App\Application\Commands\Auth\LoginUserCommand;
use App\Application\Commands\Hash\ChangeConfigCommand;
use App\Application\Handlers\Auth\CreateUserHandler;
use App\Application\Handlers\Auth\LoginUserHandler;
use App\Application\Handlers\Hash\ChangeConfigHandler;
use App\Application\Mediator;
use Illuminate\Support\ServiceProvider;

class CommandHandlerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Mediator::class, function ($app) {
            $mediator = new Mediator();
            $mediator->register(CreateUserCommand::class, $app->make(CreateUserHandler::class));
            $mediator->register(LoginUserCommand::class, $app->make(LoginUserHandler::class));
            $mediator->register(ChangeConfigCommand::class, $app->make(ChangeConfigHandler::class));

            return $mediator;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
