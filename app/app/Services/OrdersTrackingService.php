<?php

namespace App\Services;

use App\Repositories\Interface\OrdersTrackingRepositoryInterface;

class OrdersTrackingService
{
    public function __construct(
        protected OrdersTrackingRepositoryInterface $ordersTrackingRepositoryInterface
    ){}

    public function getOrdersStatusByUuid (string $orderUuid)
    {
        return $this->ordersTrackingRepositoryInterface->getOrdersStatusByUuid($orderUuid);
    }

}
