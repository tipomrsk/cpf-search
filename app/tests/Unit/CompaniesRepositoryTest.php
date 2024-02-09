<?php


use App\Repositories\CompaniesRepository;

beforeEach(function () {
    $this->CompaniesRepository = new CompaniesRepository();
});

it('should create a company', function () {
    $response = $this->CompaniesRepository->persistCompany([
        [
            '_id' => '1',
            '_cnpj' => '12345678901234',
            '_fantasia' => 'Company 1'
        ]
    ]);

    expect($response['code'])->toBe(200);
});
