<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview_detail extends Model
{

    protected $fillable = [
      'interview_details_number',
      'interview_schedule_id',
      'interview_date',
      'candidate_id',
      'interview_remarks',
      'interview_points',
      'interview_passed'
    ];

    protected $hidden = [
        'password',
    ];
}
