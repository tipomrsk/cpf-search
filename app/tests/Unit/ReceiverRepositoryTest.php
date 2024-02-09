<?php


use App\Repositories\ReceiversRepository;

beforeEach(function () {
    $this->receiverRepository = new ReceiversRepository();
});

it('should create a receiver', function () {

    $faker = \Faker\Factory::create('pt_BR');

    $response = $this->receiverRepository->persistReceiver([
            '_cpf' => $faker->cpf(false),
            '_nome' => $faker->name(),
            '_endereco' => $faker->address(),
            '_estado' => $faker->state(),
            '_cep' => $faker->postcode(),
            '_pais' => $faker->country(),
            '_geolocalizao' => [
                '_lat' => $faker->latitude(),
                '_lng' => $faker->longitude()
            ]

    ]);

    expect($response['code'])->toBe(200);
});

it('should not create a receiver with duplicate cpf', function () {

    $faker = \Faker\Factory::create('pt_BR');

    $response = $this->receiverRepository->persistReceiver([
        '_cpf' => '35595606088',
        '_nome' => $faker->name(),
        '_endereco' => $faker->address(),
        '_estado' => $faker->state(),
        '_cep' => $faker->postcode(),
        '_pais' => $faker->country(),
        '_geolocalizao' => [
            '_lat' => $faker->latitude(),
            '_lng' => $faker->longitude()
        ]

    ]);

    expect($response['code'])->toBe(400);
});

it('should return a uuid by cpf', function () {
    $cpf = '54795289042';
    $response = $this->receiverRepository->getReceiverByUuid($cpf);
    expect($response)->toBeString()
        ->and(strlen($response))->toBe(36);
});

it('should return a null by incorrect cpf', function () {
    $cpf = '123';
    $response = $this->receiverRepository->getReceiverByUuid($cpf);
    expect($response)->toBeNull();
});

it('should return a array of orders by cpf', function () {
    $cpf = '54795289042';
    $response = $this->receiverRepository->getReceiverOrders($cpf);
    expect($response['data'])->toBeArray()
        ->and($response['code'])->toBe(200);
});

it('should return a array empty of orders by cpf', function () {
    $cpf = '54795289';
    $response = $this->receiverRepository->getReceiverOrders($cpf);
    expect($response['data'])->toBeEmpty()
        ->and($response['code'])->toBe(204);
});
