<?php

namespace App\Repositories\Interface;

interface OrdersRepositoryInterface
{
    public function persistOrder(array $order, string $senderUuid, string $receiverUuid);

}
