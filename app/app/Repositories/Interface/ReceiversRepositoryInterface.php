<?php

namespace App\Repositories\Interface;

interface ReceiversRepositoryInterface
{
    public function persistReceiver(array $receiver);

    public function getReceiverByUuid(string $_cpf);

}
