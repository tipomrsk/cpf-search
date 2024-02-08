<?php

namespace App\Repositories\API\mocky;

use App\Repositories\Interface\CompaniesRepositoryInterface;
use App\Repositories\Interface\MockyRepositoryInterface;
use Illuminate\Support\Facades\Http;

class MockyAPI implements MockyRepositoryInterface
{
    const URL = 'https://run.mocky.io/v3/';
    public function getCompanys()
    {
        try {
            $response = Http::get(self::URL . 'e8032a9d-7c4b-4044-9d00-57733a2e2637')->json();

            if ($response['code'] != 200) {
                throw new \Exception('Error to get companys on Mocky');
            }

            return ['data' => $response['data'], 'code' => 200];

        } catch (\Exception $e) {
            return ['data' => $e->getMessage(), 'code' => 400];
        }
    }
}
