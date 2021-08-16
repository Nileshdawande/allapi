<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee_leave extends Model
{

    protected $fillable = [
        'employee_id',
        'date_of_leave',
        'leave_type_id',
        'leave'
    ];


    protected $hidden = [
        'password',
    ];
}
