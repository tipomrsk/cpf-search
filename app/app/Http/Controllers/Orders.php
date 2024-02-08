<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Orders extends Controller
{

    public function __construct(
        protected OrdersService $ordersService
    ){}

    public function consultPersistOrders()
    {
        return response()->json(['message' => 'Hello World!'], 200);
    }
}
