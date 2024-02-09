<?php

use App\Repositories\OrdersRepository;
use Illuminate\Support\Str;

beforeEach(function () {
    $this->ordersRepository = new OrdersRepository();
});

it('should create a order', function () {
    $response = $this->ordersRepository->persistOrder([
        '_id' => Str::uuid(),
        '_id_transportadora' => '7c5c7174-288f-43e6-87c3-54efa2dd6d05',
        '_volumes' => 1
    ], '3d0acab6-d784-4ecb-80f0-227172ea91d9', 'd044581e-f75e-45b9-98b0-507c95df7487');

    expect($response['code'])->toBe(200);
});
