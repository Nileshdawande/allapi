<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Parameter_master extends Model
{


    protected $fillable = [
        'parameter_name'
    ];

    protected $hidden = [
        'password',
    ];
}
