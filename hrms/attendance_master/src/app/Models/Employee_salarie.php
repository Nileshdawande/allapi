<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee_salarie extends Model
{

    protected $fillable = [
        'employee_id',
        'month_of_year',
        'date_of_salary_processing',
        'no_of_expected_wroking_days',
        'no_of_days_worked',
        'salary_deduction_amount',
        'salary_deduction_type',
        'net_amount',
        'salary_transferred'
    ];


    protected $hidden = [
        'password',
    ];
}
