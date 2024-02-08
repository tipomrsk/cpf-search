<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Interface\CompaniesRepositoryInterface;
use Illuminate\Http\Response;

class CompaniesRepository implements CompaniesRepositoryInterface
{

    public function persistCompany (array $companys): array
    {
        try {
            foreach ($companys as $company) {

                $return = Company::create([
                    'uuid' => $company['_id'],
                    'cnpj' => $company['_cnpj'],
                    'fantasy_name' => $company['_fantasia'],
                ]);


                if (!$return) {
                    throw new \Exception("Error to persist company {$company['_fantasia']}");
                }
            }

            return ['message' => 'Companies persisted successfully', 'code' => Response::HTTP_OK];

        } catch (\Exception $e) {
            return ['message' => $e->getMessage()];
        }
    }
}
