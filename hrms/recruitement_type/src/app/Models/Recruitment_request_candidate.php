<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Recruitment_request_candidate extends Model 
{
    
    protected $fillable = [
        'recruitment_request_id',
        'candidate_id',
        'date_of_reg'
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
