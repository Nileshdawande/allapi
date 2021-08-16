<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{


    protected $fillable = [
        'project_name',
        'contract_name',
        'project_start_date',
        'project_expected_date',
        'requirement_category',
        'project_actual_date',
        'project_details',
        'project_leader',
        'status',
        'project_key',
        'members',
    ];

    protected $hidden = [
        'password',
    ];
}
