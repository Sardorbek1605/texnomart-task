<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Employee extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    public $sortable = ['first_name', 'last_name', 'email', 'created_at', 'status'];

    protected $guarded = [];

    //statuses employee
    const ACTIVE = 'active'; // is active status
    const INACTIVE = 'inactive'; // is inactive status

    public function company(){
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
