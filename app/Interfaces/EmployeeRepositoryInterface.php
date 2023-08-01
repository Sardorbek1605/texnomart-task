<?php


namespace App\Interfaces;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;

interface EmployeeRepositoryInterface
{
    public function index();

    public function store(StoreEmployeeRequest $storeEmployeeRequest);

    public function edit(Employee $employee);

    public function update(UpdateEmployeeRequest $updateEmployeeRequest, Employee $employee);

    public function delete(Employee $employee);
}
