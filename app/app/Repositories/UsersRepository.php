<?php

namespace App\Repositories;

use App\Repositories\Interface\UsersRepositoryInterface;

class UsersRepository implements UsersRepositoryInterface
{

    public function persistUser($cpf)
    {
        return true;
    }
}
