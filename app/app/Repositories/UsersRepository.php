<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interface\UsersRepositoryInterface;

class UsersRepository implements UsersRepositoryInterface
{

    public function persistUser($cpf)
    {
        return true;
    }
}
