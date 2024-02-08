<?php

namespace App\Repositories;

use App\Helpers\StringHelper;
use App\Models\Order;
use App\Models\Receiver;
use App\Repositories\Interface\ReceiversRepositoryInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ReceiversRepository implements ReceiversRepositoryInterface
{

    public function persistReceiver(array $receiver): array
    {
        try {
            $persist = Receiver::create([
                'uuid' => Str::uuid(),
                'cpf' => StringHelper::sanitizeStrings($receiver['_cpf']),
                'name' => $receiver['_nome'],
                'address'  => $receiver['_endereco'],
                'state' => $receiver['_estado'],
                'cep' => StringHelper::sanitizeStrings($receiver['_cep']),
                'country' => $receiver['_pais'],
                'lat' => $receiver['_geolocalizao']['_lat'],
                'lng' => $receiver['_geolocalizao']['_lng'],
            ]);


            if (!$persist) {
                throw new \Exception("Error to persist sender {$receiver['_nome']}");
            }

            return ['message' => 'Senders persisted successfully', 'code' => Response::HTTP_OK];
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return ['message' => $e->getMessage()];
        }
    }

    public function getReceiverByUuid(string $cpf)
    {
        return Receiver::select('uuid')->where('cpf', $cpf)->first()->uuid;
    }

    public function getReceiverOrders(string $cpf): array
    {
        try {
            $receiver = Order::select(
                'orders.uuid',
                'orders.company_id',
                'orders.sender_id',
                'orders.receiver_id',
                'orders.volume',
                'orders.created_at')
                ->join('receivers', 'orders.receiver_id', 'receivers.uuid')
                ->where('receivers.cpf', $cpf)
                ->get()
                ->toArray();

            if (!$receiver) {
                throw new \Exception("This receiver does not have any order.");
            }

            return [
                'data' => $receiver,
                'code' => Response::HTTP_OK,
                'message' => 'Receiver orders found successfully'
            ];
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            return [
                'data' => [],
                'code' => Response::HTTP_NO_CONTENT,
                'message' => $e->getMessage()
            ];
        }
    }
}
