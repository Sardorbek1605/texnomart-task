<?php


namespace App\Repositories;


use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Interfaces\CompanyRepositoryInterface;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function index()
    {
        return Company::query()->sortable()->withCount('employees as employees_count')->paginate(10);
    }

    public function store(StoreCompanyRequest $storeCompanyRequest)
    {
        $data = $storeCompanyRequest->all();
        if ($storeCompanyRequest->hasFile('logo')){
            $file = $storeCompanyRequest->file('logo');
            $fileName = $this->fileUpload($file);
            $data['logo'] = $fileName;
        }else{
            $data['logo'] = '';
        }
        return Company::create($data);
    }

    public function update(UpdateCompanyRequest $updateCompanyRequest, Company $company)
    {
        $data = $updateCompanyRequest->all();
        if ($updateCompanyRequest->hasFile('logo')){
            $file = $updateCompanyRequest->file('logo');
            $fileName = $this->fileUpload($file);
            $data['logo'] = $fileName;
        }else{
            $data['logo'] = $company->logo;
        }
        return $company->update($data);
    }

    public function delete(Company $company)
    {
        $this->fileRemove($company->logo);
        return $company->delete();
    }

    public function fileUpload($file)
    {
        $ext = $file->getClientOriginalExtension();
        $fileName = time().".".$ext;
        $file->move(storage_path('app/public/'), $fileName);
        return $fileName;
    }

    public function fileRemove($fileName)
    {
        return Storage::delete('public/'.$fileName);
    }
}
