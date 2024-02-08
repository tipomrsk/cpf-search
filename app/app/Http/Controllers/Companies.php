<?php

namespace App\Http\Controllers;

use App\Services\CompaniesService;
use Illuminate\Http\Request;

class Companies extends Controller
{

    public function __construct(
        protected CompaniesService $companysService
    ){}

    public function consultPersistCompany()
    {
        return $this->companysService->consultPersistCompany();
    }
}
