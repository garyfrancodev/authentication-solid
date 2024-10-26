<?php

namespace App\Infrastructure\Repositories\User;

use App\Domain\Repositories\UserRepository;
use App\Models\User;

class UserRepositoryImpl implements UserRepository
{

    public function findById(string $id)
    {
        return User::findOrFail($id);
    }

    public function store($data)
    {
        error_log($data->getPassword());
        $data = [
            'id' => $data->getId(),
            'name' => $data->getName(),
            'email' => $data->getEmail(),
            'password' => $data->getPassword(),
        ];

        return User::create($data);
    }
}
