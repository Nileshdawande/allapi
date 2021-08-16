<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Salary_head extends Model
{

    protected $fillable = [
      'salary_head_name',
      'type',
    ];


    protected $hidden = [
        'password',
    ];
}
