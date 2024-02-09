<?php

namespace App\Repositories;

use App\Models\Sender;
use App\Repositories\Interface\SendersRepositoryInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class SendersRepository implements SendersRepositoryInterface
{


    /**
     * Cria o registro do remetente
     *
     * @param array $sender
     * @return array
     */
    public function persistSender(array $sender)
    {
        try {
            $persist = Sender::create([
                'uuid' => Str::uuid(),
                'name' => $sender['_nome'],
            ]);

            if (!$persist) {
                throw new \Exception("Error to persist sender {$sender['_nome']}");
            }

            return ['message' => 'Senders persisted successfully', 'code' => Response::HTTP_OK];
        } catch (\Exception $e) {
            return ['message' => $e->getMessage()];
        }
    }

    /**
     * Busca o UUID pelo nome do remetente
     *
     * @param string $senderName
     * @return null
     */
    public function getSenderByUuid(string $senderName)
    {
        $uuid = Sender::select('uuid')->where('name', $senderName)->first();

        if (!$uuid) {
            return null;
        }

        return $uuid->uuid;
    }
}
