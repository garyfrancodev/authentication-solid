<?php

namespace App\Application\Commands\Hash;

use App\Http\Requests\PutConfigRequest;

class ChangeConfigCommand
{
    public PutConfigRequest $request;

    public function __construct(PutConfigRequest $request)
    {
        $this->request = $request;
    }
}
