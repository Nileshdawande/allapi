<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview_type extends Model
{

    protected $fillable = [
      'interview_type_name'
    ];

    protected $hidden = [
        'password',
    ];
}
