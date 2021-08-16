<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Contract extends Model
{



    protected $fillable = [
        'contract_number',
        'company',
        'lead_id',
        'requirement_category',
        'sales_employee',
        'contract_type',
        'contract_short_des',
        'contract_detailed'
    ];


    protected $hidden = [
        'password',
    ];
}
