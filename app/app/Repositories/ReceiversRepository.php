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


    /**
     * Cria o registro do destinatário
     *
     * @param array $receiver
     * @return array
     */
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
            return ['message' => $e->getMessage(), 'code' => Response::HTTP_BAD_REQUEST];
        }
    }

    /**
     * Busca o UUID pelo cpf do destinatário
     *
     * @param string $cpf
     * @return null
     */
    public function getReceiverByUuid(string $cpf)
    {
        $uuid = Receiver::select('uuid')->where('cpf', $cpf)->first();

        if (!$uuid) {
            return null;
        }

        return $uuid->uuid;

    }

    /**
     * Busca as entregas de um determinado destinatário
     *
     * @param string $cpf
     * @return array
     */
    public function getReceiverOrders(string $cpf): array
    {
        try {
            $receiver = Order::select(
                'orders.uuid',
                'orders.company_id',
                'receivers.name as receiver_name',
                'senders.name as sender_name',
                )
                ->join('receivers', 'orders.receiver_id', 'receivers.uuid')
                ->join('senders', 'orders.sender_id', 'senders.uuid')
                ->where('receivers.cpf', $cpf)
                ->get()
                ->toArray();

            if (!$receiver) {
                throw new \Exception("This receiver does not have any order.");
            }

            return [
                'code' => Response::HTTP_OK,
                'message' => 'Receiver orders found successfully',
                'data' => $receiver,
            ];
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            return [
                'code' => Response::HTTP_NO_CONTENT,
                'message' => $e->getMessage(),
                'data' => [],
            ];
        }
    }
}
