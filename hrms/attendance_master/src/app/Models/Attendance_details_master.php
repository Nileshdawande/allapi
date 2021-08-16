<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance_details_master extends Model
{

    protected $fillable = [
        'employee_id',
        'office_id',
        'work_date',
        'working'
    ];


    protected $hidden = [
        'password',
    ];
}
