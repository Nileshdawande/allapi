<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Technologywise_skill extends Model 
{
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'technology_id',
        'skills_id'
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
