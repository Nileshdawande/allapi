<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Dipartment_master extends Model 
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dipartment_name', 
        'short_name',
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
