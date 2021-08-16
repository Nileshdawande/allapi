<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Employee_type_master extends Model
{

    protected $fillable = [
      'employee_type_name'
    ];


    protected $hidden = [
        'password',
    ];
}
