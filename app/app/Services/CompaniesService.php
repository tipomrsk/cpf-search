<?php

namespace App\Services;

use App\Repositories\Interface\CompaniesRepositoryInterface;
use App\Repositories\Interface\MockyRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CompaniesService
{

    public function __construct(
        protected CompaniesRepositoryInterface $companysRepositoryInterface,
        protected MockyRepositoryInterface     $mockyRepositoryInterface
    ){}

    /**
     * Método responsável por consultar as empresas no Mocky e persistir elas internamente
     *
     * @return JsonResponse
     */
    public function consultPersistCompany(): JsonResponse
    {
        try {
            $mockyCompanys = $this->mockyRepositoryInterface->getCompanys();

            if ($mockyCompanys['code'] != 200) {
                throw new \Exception($mockyCompanys['data']);
            }

            $persist = $this->companysRepositoryInterface->persistCompany($mockyCompanys['data']);

            return response()->json($persist, Response::HTTP_OK);

        } catch (\Exception $e){
            return response()->json($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

}
