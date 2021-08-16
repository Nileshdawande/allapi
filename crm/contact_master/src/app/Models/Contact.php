<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',  
        'designation_id',
        'department_id',
        'address_one',
        'address_two',
        'state',
        'city',
        'country',
        'pincode',
        'email',
        'website',
        'contact_one',
        'contact_two',
        'registration_date',
        'contact_type'
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
