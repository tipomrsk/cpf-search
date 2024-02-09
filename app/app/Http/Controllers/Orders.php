<?php

namespace App\Http\Controllers;

use App\Services\OrdersService;
use Illuminate\Http\Request;

class Orders extends Controller
{

    public function __construct(
        protected OrdersService $ordersService
    ){}

    public function consultPersistOrders()
    {
        return $this->ordersService->consultPersistOrders();
    }

    public function getOrderStatus ($request)
    {
        return $this->ordersService->getOrderStatus($request->uuid);
    }
}
