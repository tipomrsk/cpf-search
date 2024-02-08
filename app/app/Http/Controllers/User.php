<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetUserRequest;
use App\Services\UsersService;


class User extends Controller
{

    public function __construct(
        protected UsersService $usersService
    ){}

    public function getData(GetUserRequest $cpf)
    {
        return $this->usersService->getData($cpf);
    }
}
