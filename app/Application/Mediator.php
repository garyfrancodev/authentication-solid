<?php

namespace App\Application;

class Mediator
{
    protected $handlers = [];

    public function register(string $command, $handler)
    {
        $this->handlers[$command] = $handler;
    }

    public function send($command)
    {
        if (!isset($this->handlers[get_class($command)])) {
            throw new \Exception("Handler not found for command: " . get_class($command));
        }

        return $this->handlers[get_class($command)]->handle($command);
    }
}
