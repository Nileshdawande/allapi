<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Company_type extends Model
{

    protected $fillable = [
       'company_type_name'
    ];


    protected $hidden = [
        'password',
    ];
}
