<?php

test('if cpf has less than 11 characters', function () {
    expect($this->get('/api/get-data/630799830'))->assertStatus(400);
});

test('if cpf is mathematic invalid', function () {
    expect($this->get('/api/get-data/12312312312'))->assertStatus(400);
});

test('if cpf is mathematic valid', function () {
    expect($this->get('/api/get-data/63079983009'))->assertStatus(200);
});
