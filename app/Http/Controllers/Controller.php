<?php

namespace App\Http\Controllers;

use App\Application\Mediator;

abstract class Controller
{
    protected $mediator;

    public function __construct(Mediator $mediator)
    {
        $this->mediator = $mediator;
    }
}
