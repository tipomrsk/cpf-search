<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Interface\OrdersRepositoryInterface;
use Illuminate\Http\Response;

class OrdersRepository implements OrdersRepositoryInterface
{
    public function persistOrder(array $order, string $senderUuid, string $receiverUuid)
    {
        try {
            $return = Order::create([
                'uuid' => $order['_id'],
                'company_id' => $order['_id_transportadora'],
                'sender_id' => $senderUuid,
                'receiver_id' => $receiverUuid,
                'volume' => $order['_volumes'],
            ]);

            if (!$return) {
                throw new \Exception("Error to persist order {$order['_id']}");
            }


            return ['message' => 'Companies persisted successfully', 'code' => Response::HTTP_OK];

        } catch (\Exception $e) {
            return ['message' => $e->getMessage()];
        }
    }

}
