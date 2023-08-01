<?php


namespace App\Repositories;


use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Interfaces\CompanyRepositoryInterface;
use App\Interfaces\EmployeeRepositoryInterface;
use App\Models\Company;
use App\Models\Employee;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function index()
    {

    }

    public function store(StoreEmployeeRequest $storeEmployeeRequest)
    {

    }

    public function edit(Employee $employee)
    {

    }

    public function update(UpdateEmployeeRequest $updateEmployeeRequest, Employee $employee)
    {

    }

    public function delete(Employee $employee)
    {

    }
}
