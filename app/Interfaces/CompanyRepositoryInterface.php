<?php


namespace App\Interfaces;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;

interface CompanyRepositoryInterface
{
    public function index();

    public function store(StoreCompanyRequest $storeCompanyRequest);

    public function update(UpdateCompanyRequest $updateCompanyRequest, Company $company);

    public function delete(Company $company);
}
