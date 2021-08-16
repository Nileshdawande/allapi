<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Employee_annual_leaves_master extends Model
{

    protected $fillable = [
      'year',
      'branch_id',
      'leave_type_id',
      'no_of_leaves'
    ];


    protected $hidden = [
        'password',
    ];
}
