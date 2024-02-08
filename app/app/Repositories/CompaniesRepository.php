<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Interface\CompaniesRepositoryInterface;

class CompaniesRepository implements CompaniesRepositoryInterface
{

    public function persistCompany (array $companys)
    {
        foreach ($companys as $company) {

            Company::create([
                'uuid' => $company['_id'],
                'cnpj' => $company['_cnpj'],
                'fantasy_name' => $company['_fantasia'],
            ]);

        }

        return ['status' => 'success', 'message' => 'Companies persisted successfully'];
    }
}
