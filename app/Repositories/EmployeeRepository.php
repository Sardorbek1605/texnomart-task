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
        return Employee::query()->sortable()->paginate(10);
    }

    public function create()
    {
        return Company::query()->orderByDesc('id')->get();
    }

    public function store(StoreEmployeeRequest $storeEmployeeRequest)
    {
        $storeEmployeeRequest['status'] = $storeEmployeeRequest->status == 'on' ? Employee::ACTIVE : Employee::INACTIVE;
        return Employee::create($storeEmployeeRequest->all());
    }

    public function edit(Employee $employee)
    {
        $response = [
            'employee' => $employee,
            'companies' => Company::query()->orderByDesc('id')->get()
        ];
        return $response;
    }

    public function update(UpdateEmployeeRequest $updateEmployeeRequest, Employee $employee)
    {
        $updateEmployeeRequest['status'] = $updateEmployeeRequest->status == 'on' ? Employee::ACTIVE : Employee::INACTIVE;
        return $employee->update($updateEmployeeRequest->all());
    }

    public function delete(Employee $employee)
    {
        return $employee->delete();
    }
}
