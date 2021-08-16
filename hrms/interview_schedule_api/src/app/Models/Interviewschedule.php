<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interviewschedule extends Model
{

    protected $fillable = [
        'interview_schedule_number',
        'recruitment_req_id',
        'interview_schedule_date',
        'interview_schedule_venue'
    ];

    protected $hidden = [
        'password',
    ];
}
