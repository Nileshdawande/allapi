<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Recruitment_request extends Model 
{
    
    protected $fillable = [
        'recruitment_type_id',
        'recruitment_name',
        'recruitment_req_date',
        'recruitment_end_date',
        'technology_id',
        'client_id',
        'no_of_candidate',
        'min_exp',
        'max_exp',
        'salary_from',
        'salary_to',
        'description'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
