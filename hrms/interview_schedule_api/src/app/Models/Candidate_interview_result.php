<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate_interview_result extends Model
{

    protected $fillable = [
        'can_int_sch_id',
        'parameter_id',
        'parameter_points'
    ];

    protected $hidden = [
        'password',
    ];
}
