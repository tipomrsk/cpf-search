<?php

namespace App\Services;

use App\Repositories\Interface\ReceiversRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ReceiversService
{

    public function __construct(
        protected ReceiversRepositoryInterface $receiversRepositoryInterface
    ){}


    /**
     * Método responsável por consultar os dados do destinatário
     *
     * @param $cpf
     * @return JsonResponse
     */
    public function getReceiverOrders ($cpf): JsonResponse
    {
        $return = $this->receiversRepositoryInterface->getReceiverOrders($cpf);

        return response()->json($return['data'], $return['code']);
    }

}
