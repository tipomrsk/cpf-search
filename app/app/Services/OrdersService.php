<?php

namespace App\Services;

use App\Repositories\Interface\MockyRepositoryInterface;
use App\Repositories\Interface\OrdersRepositoryInterface;
use App\Repositories\Interface\ReceiversRepositoryInterface;
use App\Repositories\Interface\SendersRepositoryInterface;
use Illuminate\Http\JsonResponse;

class OrdersService
{

    public function __construct(
        protected OrdersRepositoryInterface    $ordersRepositoryInterface,
        protected MockyRepositoryInterface     $mockyRepositoryInterface,
        protected SendersRepositoryInterface   $sendersRepositoryInterface,
        protected ReceiversRepositoryInterface $receiresRepositoryInterface
    ){}

    /**
     * Método responsável por consultar os pedidos no Mocky e persistir eles internamente
     *
     * @return JsonResponse
     */
    public function consultPersistOrders(): JsonResponse
    {
        try {
            $mockyOrders = $this->mockyRepositoryInterface->getOrders();

            if ($mockyOrders['code'] != 200) {
                throw new \Exception($mockyOrders['data']);
            }

            $persist = $this->ordersRepositoryInterface->persistOrders($mockyOrders['data']);

            return response()->json($persist, Response::HTTP_OK);

        } catch (\Exception $e){
            return response()->json($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

}
