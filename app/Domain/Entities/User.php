<?php

namespace App\Domain\Entities;

use App\Kernel\Core\Entity;
use Illuminate\Support\Str;


class User extends Entity
{
    private string $name;
    private string $email;
    private string $password;

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->id = Str::uuid();
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

}
