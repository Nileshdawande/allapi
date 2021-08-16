<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Employee_designation extends Model
{

    protected $fillable = [
      'designation_name',
      'department_id',
      'status'
    ];


    protected $hidden = [
        'password',
    ];
}
