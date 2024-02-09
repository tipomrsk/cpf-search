<?php

namespace App\Http\Controllers;

use App\Services\OrdersTrackingService;
use Illuminate\Http\Request;

class OrdersTracking extends Controller
{
    public function __construct(
        protected OrdersTrackingService $ordersTrackingService
    ){}

    public function getOrdersStatusByUuid (Request $request)
    {
        return $this->ordersTrackingService->getOrdersStatusByUuid($request->uuid);
    }
}
