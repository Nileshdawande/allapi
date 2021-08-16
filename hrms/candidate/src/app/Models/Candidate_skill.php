<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Candidate_skill extends Model
{


    protected $fillable = [
      'candidate_id',
      'candidate_skill_id',
      'level'
    ];


    protected $hidden = [
        'password',
    ];
}
