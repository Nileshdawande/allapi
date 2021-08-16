<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer_detail extends Model
{


    protected $fillable = [
        'interview_details_id',
        'candidate_id',
        'offer_date',
        'gross_salary_offered',
        'offer_accepted',
        'liasing_employee_id'
    ];


    protected $hidden = [
        'password',
    ];
}
