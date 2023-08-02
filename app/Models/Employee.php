<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    //statuses employee
    const ACTIVE = 'active'; // is active status
    const INACTIVE = 'inactive'; // is inactive status

    public function company(){
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
