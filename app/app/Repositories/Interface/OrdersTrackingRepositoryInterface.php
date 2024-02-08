<?php

namespace App\Repositories\Interface;

interface OrdersTrackingRepositoryInterface
{
    public function persistOrderTracking(array $statusRastreamento, string $orderUuid);
}
