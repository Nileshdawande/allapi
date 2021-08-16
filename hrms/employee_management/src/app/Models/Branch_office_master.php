<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Branch_office_master extends Model
{

    protected $fillable = [
      'branch_id',
      'office_id',
      'status',
      'date_of_activation',
      'date_of_deactivation'
    ];


    protected $hidden = [
        'password',
    ];
}
