<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User_detail extends Model
{



    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'email',
        'password',
        'created_by',
        'updated_by',
        'access',
        'status',
        'role',

    ];


    protected $hidden = [
        'password',
    ];
}
