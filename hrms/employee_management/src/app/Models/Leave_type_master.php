<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Leave_type_master extends Model
{

    protected $fillable = [
      'leave_type_name',
    ];


    protected $hidden = [
        'password',
    ];
}
