<?php

namespace App\Services;

use App\Repositories\Interface\OrdersTrackingRepositoryInterface;

class OrdersTrackingService
{
    public function __construct(
        protected OrdersTrackingRepositoryInterface $ordersTrackingRepositoryInterface
    ){}

    public function getOrderStatusByUuid (string $orderUuid)
    {
        return $this->ordersTrackingRepositoryInterface->getOrderStatusByUuid($orderUuid);
    }

}
