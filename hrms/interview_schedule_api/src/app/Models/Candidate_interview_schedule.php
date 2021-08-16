<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate_interview_schedule extends Model
{

    protected $fillable = [
        'interview_details_id',
        'interview_type_id',
        'employee_interviewer_id',
        'interview_schedule_date',
        'interview_schedule_time',
        'interview_actual_date',
        'interview_actual_time',
        'interview_points',
        'remarks',
        'interview_result',
        'attachments'
    ];

    protected $hidden = [
        'password',
    ];
}
