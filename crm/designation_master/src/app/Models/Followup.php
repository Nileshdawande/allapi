<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Followup extends Model
{

    protected $fillable = [
        'interaction_date',
        'lead_id',
        'interaction_name',
        'lead_weight',
        'lead_status',
        'next_followup_date',
        'remarks',
        'followup_id'
    ];

    protected $hidden = [
        'password',
    ];
}
