<?php

namespace App\Kernel\Core;

interface Repository
{
    public function findById(string $id);

    public function store($data);

}
