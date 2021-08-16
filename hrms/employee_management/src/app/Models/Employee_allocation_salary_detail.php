<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Employee_allocation_salary_detail extends Model
{

    protected $fillable = [
      'salary_head_id',
      'amount'
    ];


    protected $hidden = [
        'password',
    ];
}
