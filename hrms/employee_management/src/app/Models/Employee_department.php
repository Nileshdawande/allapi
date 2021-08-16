<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Employee_department extends Model
{

    protected $fillable = [
      'department_name',
      'status'
    ];


    protected $hidden = [
        'password',
    ];
}
