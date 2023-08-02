<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Company extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    public $sortable = ['name', 'email', 'url', 'created_at'];

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
