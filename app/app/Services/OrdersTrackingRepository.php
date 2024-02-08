<?php

namespace App\Services;

use App\Models\OrderTracking;
use App\Repositories\Interface\OrdersTrackingRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class OrdersTrackingRepository implements OrdersTrackingRepositoryInterface
{

    public function persistOrderTracking(array $statusRastreamento, string $orderUuid)
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
}
