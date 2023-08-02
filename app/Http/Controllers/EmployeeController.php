<?php

namespace App\Http\Controllers;

use App\Interfaces\EmployeeRepositoryInterface;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    protected $employeeRepository;
    public function __construct(EmployeeRepositoryInterface $employeeRepository){
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = $this->employeeRepository->index();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = $this->employeeRepository->create();
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->employeeRepository->store($request);
            DB::commit();
            Alert::success('Employee created successfully!');
            return redirect()->route('employees.index');
        }catch (\Exception $e){
            DB::rollBack();
            Alert::error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $response = $this->employeeRepository->edit($employee);
        return view('employees.edit', $response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        DB::beginTransaction();
        try {
            $this->employeeRepository->update($request, $employee);
            DB::commit();
            Alert::success('Employee updated successfully!');
            return redirect()->route('employees.index');
        }catch (\Exception $e){
            DB::rollBack();
            Alert::error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        DB::beginTransaction();
        try {
            $this->employeeRepository->delete($employee);
            DB::commit();
            Alert::success('Employee deleted successfully!');
            return redirect()->back();
        }catch (\Exception $e){
            DB::rollBack();
            Alert::error($e->getMessage());
            return redirect()->back();
        }
    }
}
