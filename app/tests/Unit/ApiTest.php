<?php

use App\Repositories\API\mocky\MockyAPI;

beforeEach(function () {
    $this->MockyRepository = new MockyAPI();
});

test('get orders from api should return 200 code', function () {

    $response = $this->MockyRepository->getOrders();
    expect($response['code'])->toBe(200);
});

test('get companies from api should return 200 code', function () {
    $response = $this->MockyRepository->getCompanys();
    expect($response['code'])->toBe(200);
});



