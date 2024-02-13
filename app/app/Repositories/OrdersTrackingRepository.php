<?php

namespace App\Repositories;

use App\Models\OrderTracking;
use App\Repositories\Interface\OrdersTrackingRepositoryInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class OrdersTrackingRepository implements OrdersTrackingRepositoryInterface
{

    /**
     * Persiste o rastreamento da entrega
     *
     * @param array $statusRastreamento
     * @param string $orderUuid
     * @return array
     */
    public function persistOrderTracking(array $statusRastreamento, string $orderUuid): array
    {
        try {

            foreach ($statusRastreamento as $status) {
                $persist = OrderTracking::create([
                    'order_id' => $orderUuid,
                    'status' => $status['message'],
                    'status_date' => Carbon::parse($status['date'])->format('Y-m-d H:i:s'),
                ]);

                if (!$persist) {
                    throw new \Exception("Error to persist sender {$status['status']}");
                }
            }

            return ['message' => 'Senders persisted successfully', 'code' => Response::HTTP_OK];
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return ['message' => $e->getMessage()];
        }
    }

    /**
     * Busca os status da entrega pelo UUID
     *
     * @param string $orderUuid
     * @return array
     */
    public function getOrderStatusByUuid(string $orderUuid): array
    {
        try {
            $orderTracking = OrderTracking::select('status', 'status_date')
                ->where('order_id', $orderUuid)
                ->get()
                ->toArray();

            if (!$orderTracking) {
                throw new \Exception("Order not found");
            }

            return [
                'message' => 'Order found',
                'code' => Response::HTTP_OK,
                'data' => $orderTracking,
            ];
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return [
                'message' => $e->getMessage(),
                'code' => Response::HTTP_NO_CONTENT,
                'data' => []
            ];
        }
    }
}
