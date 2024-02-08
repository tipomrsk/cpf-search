<?php

namespace App\Services;

use App\Repositories\Interface\CompaniesRepositoryInterface;
use App\Repositories\Interface\MockyRepositoryInterface;
use Illuminate\Http\Response;

class CompaniesService
{

    public function __construct(
        protected CompaniesRepositoryInterface $companysRepositoryInterface,
        protected MockyRepositoryInterface     $mockyRepositoryInterface
    ){}

    public function consultPersistCompany()
    {
        try {
            $mockyCompanys = $this->mockyRepositoryInterface->getCompanys();

            if ($mockyCompanys['code'] != 200) {
                throw new \Exception($mockyCompanys['data']);
            }

            $persist = $this->companysRepositoryInterface->persistCompany($mockyCompanys['data']);

            return response()->json($persist, Response::HTTP_OK);

        } catch (\Exception $e){
            return ['error' => $e->getMessage(), 'code' => $e->getCode()];
        }

    }

}
