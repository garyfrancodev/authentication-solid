<?php

namespace App\Kernel\Core;

abstract class Entity
{
    public string $id;

    public function getId(): string
    {
        return $this->id;
    }
}
