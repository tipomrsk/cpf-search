<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Interface\CompaniesRepositoryInterface;
use Illuminate\Http\Response;

class CompaniesRepository implements CompaniesRepositoryInterface
{


    /**
     * Cria uma nova empresa de transporte
     *
     * @param array $companys
     * @return array
     */
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
            return ['message' => 'Error to persist', 'code' => Response::HTTP_BAD_REQUEST];
        }
    }
}
