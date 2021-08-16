<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Company_master extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'company_type_id',
        'system_type',
        'address_first',
        'address_second',
        'city',
        'state',
        'country',
        'pincode',
        'email',
        'website',
        'contact_one',
        'contact_two',
        'contact_id',
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
