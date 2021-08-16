<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Company_annual_leaves_master extends Model
{

    protected $fillable = [
      'year',
      'branch_id',
      'annual_leave_date',
      'leave_on_account_of',
      'leave_cancelled',
      'reason_for_cancellation'
    ];


    protected $hidden = [
        'password',
    ];
}
