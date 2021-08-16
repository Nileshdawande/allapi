<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Employee_allocation_head extends Model
{

    protected $fillable = [
      'employee_id',
      'date_of_allocation',
      'designation_id',
      'department_id',
      'branch_id',
      'gross_salary',
      'deduction',
      'net_salary',
      'allocation_type'
    ];


    protected $hidden = [
        'password',
    ];
}
