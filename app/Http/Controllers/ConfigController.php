<?php

namespace App\Http\Controllers;

use App\Application\Commands\Hash\ChangeConfigCommand;
use App\Http\Requests\PutConfigRequest;
use Illuminate\Http\Request;


class ConfigController extends Controller
{
    public function changeConfig(PutConfigRequest $request)
    {
        $command = new ChangeConfigCommand($request);
        return $this->mediator->send($command);
    }
}
