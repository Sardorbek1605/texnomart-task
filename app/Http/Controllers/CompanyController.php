<?php

namespace App\Http\Controllers;

use App\Interfaces\CompanyRepositoryInterface;
use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyController extends Controller
{
    protected $companyRepository;
    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = $this->companyRepository->index();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->companyRepository->store($request);
            DB::commit();
            Alert::success('Company created successfully!');
            return redirect()->route('companies.index');
        }catch (\Exception $e){
            DB::rollBack();
            Alert::error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        DB::beginTransaction();
        try {
            $this->companyRepository->update($request, $company);
            DB::commit();
            Alert::success('Company updated successfully!');
            return redirect()->route('companies.index');
        }catch (\Exception $e){
            DB::rollBack();
            Alert::error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        DB::beginTransaction();
        try {
            $this->companyRepository->delete($company);
            DB::commit();
            Alert::success('Company deleted successfully!');
            return redirect()->back();
        }catch (\Exception $e){
            DB::rollBack();
            Alert::error($e->getMessage());
            return redirect()->back();
        }
    }
}
