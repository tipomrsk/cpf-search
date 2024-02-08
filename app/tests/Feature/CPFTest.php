<?php

test('if cpf is valid AND less than 11 characters', function () {
    expect($this->get('/api/get-data?cpf=630799830'))->assertStatus(422);
});

test('if cpf is mathematic invalid', function () {
    expect($this->get('/api/get-data?cpf=12312312312'))->assertStatus(422);
});

test('if cpf is mathematic valid', function () {
    expect($this->get('/api/get-data?cpf=63079983009'))->assertStatus(200);
});

test('if cpf has same caracters', function () {
    expect($this->get('/api/get-data?cpf=11111111111'))->assertStatus(422);
});

test('if cpf is invalid AND less than 11 characters', function () {
    expect($this->get('/api/get-data?cpf=11111111'))->assertStatus(422);
});
