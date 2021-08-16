<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Softlabs_branch_master extends Model
{

    protected $fillable = [
        'branch_code',
        'branch_name',
        'address_one',
        'address_two',
        'address_three',
        'branch_pincode',
        'branch_city',
        'branch_state',
        'branch_country',
        'branch_start_date',
        'date_of_decommissioning',
        'branch_status',
        'branch_head_office'
    ];


    protected $hidden = [
        'password',
    ];
}
