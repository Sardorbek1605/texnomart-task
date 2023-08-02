<?php


namespace App\Services;



use Illuminate\Support\Facades\Storage;

class CompanyFileService
{
    public static function fileUpload($file)
    {
        $ext = $file->getClientOriginalExtension();
        $fileName = time().".".$ext;
        $file->move(storage_path('app/public/'), $fileName);
        return $fileName;
    }

    public static function fileRemove($fileName)
    {
        return Storage::delete('public/'.$fileName);
    }
}
