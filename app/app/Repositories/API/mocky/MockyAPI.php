<?php

namespace App\Repositories\API\mocky;

use App\Repositories\Interface\CompaniesRepositoryInterface;
use App\Repositories\Interface\MockyRepositoryInterface;
use Illuminate\Support\Facades\Http;

class MockyAPI implements MockyRepositoryInterface
{
    const URL = 'https://run.mocky.io/v3/';


    /**
     * Busca as companias na api do Mocky
     *
     * @return array
     */
    public function getCompanys(): array
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


    /**
     * Busca todas as entregas na api do Mocky
     *
     * @return array
     */
    public function getOrders(): array
    {
        try {
            $response = Http::get(self::URL . '6334edd3-ad56-427b-8f71-a3a395c5a0c7')->json();

            if ($response['code'] != 200) {
                throw new \Exception('Error to get orders on Mocky');
            }

            return ['data' => $response['data'], 'code' => 200];

        } catch (\Exception $e) {
            return ['data' => $e->getMessage(), 'code' => 400];
        }
    }
}
