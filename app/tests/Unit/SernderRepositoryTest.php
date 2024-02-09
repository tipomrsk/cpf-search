<?php

use App\Repositories\SendersRepository;

beforeEach(function () {
    $this->senderRepository = new SendersRepository();
});

it('should create a sender', function () {

    $faker = \Faker\Factory::create('pt_BR');

    $response = $this->senderRepository->persistSender([
        '_nome' => $faker->name(),
    ]);

    expect($response['code'])->toBe(200);
});

it('should return a uuid by name', function () {
    $response = $this->senderRepository->getSenderByUuid('Agro Pill TO');
    expect($response)->toBeString()
        ->and(strlen($response))->toBe(36);
});

it('should return a null by incorrect name', function () {
    $response = $this->senderRepository->getSenderByUuid('123');
    expect($response)->toBeNull();
});
