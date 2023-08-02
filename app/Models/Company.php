<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::deleted(function ($company) {
            $company->employees()->delete();
        });
    }

    public function employees(){
        return $this->hasMany(Employee::class, 'company_id', 'id');
    }
}
