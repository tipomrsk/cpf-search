<?php

namespace App\Services;

use App\Http\Requests\GetUserRequest;
use App\Repositories\Interface\ReceiversRepositoryInterface;

class ReceiversService
{

    public function __construct(
        protected ReceiversRepositoryInterface $receiversRepositoryInterface
    ){}


    public function getReceiverOrders ($cpf)
    {
        $return = $this->receiversRepositoryInterface->getReceiverOrders($cpf);

        return response()->json($return['data'], $return['code']);
    }

}
