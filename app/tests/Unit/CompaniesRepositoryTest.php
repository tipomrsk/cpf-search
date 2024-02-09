<?php


use App\Repositories\CompaniesRepository;
use Illuminate\Support\Str;

beforeEach(function () {
    $this->CompaniesRepository = new CompaniesRepository();
});

it('should create a company', function () {

    $faker = \Faker\Factory::create('pt_BR');

    $response = $this->CompaniesRepository->persistCompany([
        [
            '_id' => Str::uuid(),
            '_cnpj' => $faker->unique()->cnpj(false),
            '_fantasia' => $faker->unique()->company()
        ]
    ]);

    expect($response['code'])->toBe(200);
});
