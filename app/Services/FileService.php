<?php


namespace App\Services;


use App\Models\File;

class FileService
{
    public static function upload($file, $model, $model_id){
        $fileSave = new File();

        $file_name = time().".".$file->getClientOriginalExtension();
        $path = public_path("files/$model/$model_id");
        $file->move($path, $file_name);
        
        $fileSave->model = $model;
        $fileSave->model_id = $model_id;
        $fileSave->file_name = $file_name;
        $fileSave->path = $path;
        $fileSave->save();
    }

    public static function download(){

    }

    public static function delete(){

    }
}
