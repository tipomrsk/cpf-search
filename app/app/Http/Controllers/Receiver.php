<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetUserRequest;
use App\Services\ReceiversService;

class Receiver extends Controller
{

    public function __construct(
        protected ReceiversService $receiverService
    ){}


    public function getReceiverOrders (GetUserRequest $request)
    {
        return $this->receiverService->getReceiverOrders($request->cpf);
    }

}
