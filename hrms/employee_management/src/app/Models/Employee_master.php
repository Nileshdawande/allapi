<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Employee_master extends Model
{

    protected $fillable = [
      'user_id',
      'employee_code',
      'candidate_id',
      'employee_firstname',
      'employee_middlename',
      'employee_lastname',
      'address_one',
      'address_two',
      'address_three',
      'city',
      'state',
      'country',
      'pincode',
      'dob',
      'qual_one',
      'qual_one_details',
      'qual_two',
      'qual_two_details',
      'contact_one',
      'contact_two',
      'employee_doj',
      'department_id',
      'employee_type_id',
      'date_of_leaving',
      'status',
      'offer_id'
    ];


    protected $hidden = [
        'password',
    ];
}
