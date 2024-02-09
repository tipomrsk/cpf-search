<?php

namespace App\Services;

use App\Repositories\Interface\OrdersTrackingRepositoryInterface;

class OrdersTrackingService
{
    public function __construct(
        protected OrdersTrackingRepositoryInterface $ordersTrackingRepository
    ){}

    public function getOrdersStatusByUuid (string $orderUuid)
    {
        return $this->ordersTrackingRepository->getOrdersStatusByUuid($orderUuid);
    }

}
