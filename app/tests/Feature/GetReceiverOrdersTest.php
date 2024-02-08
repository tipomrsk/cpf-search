<?php

test('with a valid CPF, get all orders on database', function () {
    $cpf = '54795289042';
    $response = $this->get("api/receiver/orders?cpf={$cpf}");
    $response->assertStatus(200);
});

test('with a invalid CPF, return 422', function () {
    $cpf = '12345678901';
    $response = $this->get("api/receiver/orders?cpf={$cpf}");
    $response->assertStatus(422);
});

test('with a valid CPF, with no orders return 204', function () {
    $cpf = '63079983009';
    $response = $this->get("api/receiver/orders?cpf={$cpf}");
    $response->assertStatus(204);
});

