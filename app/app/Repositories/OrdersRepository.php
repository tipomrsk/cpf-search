<?php

namespace App\Repositories;

class OrdersRepository
{

    public function persistOrders(array $orders)
    {
        return response()->json(['message' => 'Hello World Repository!'], 200);
    }

}
