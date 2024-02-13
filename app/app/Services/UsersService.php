<?php

namespace App\Services;

use App\Repositories\Interface\UsersRepositoryInterface;
use Illuminate\Http\Response;

class UsersService
{

    public function __construct(
        protected UsersRepositoryInterface $usersRepositoryInterface
    ){}

    public function getData($cpf)
    {
        return response()->json(['message' => 'Its Ok!'], Response::HTTP_OK);
    }
}
