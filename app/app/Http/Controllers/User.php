<?php

namespace App\Http\Controllers;

use App\Services\UsersService;


class User extends Controller
{

    public function __construct(
        protected UsersService $usersService
    ){}

    public function getData($cpf)
    {
        return $this->usersService->getData($cpf);
    }
}
