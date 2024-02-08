<?php

namespace App\Repositories\Interface;

interface SendersRepositoryInterface
{
    public function persistSender(array $sender);

    public function getSenderByUuid(string $senderName);

}
