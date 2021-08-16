<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Softlabs_office_master extends Model
{

    protected $fillable = [
      'office_code',
      'office_name',
      'office_address_one',
      'office_address_two',
      'office_address_three',
      'office_city',
      'office_state',
      'office_country',
      'office_pincode',
      'office_start_date',
      'office_area',
      'office_contact_one',
      'office_contact_two',
      'office_contact_person',
      'office_con_per_phoneno',
      'office_status',
      'office_end_date'
    ];


    protected $hidden = [
        'password',
    ];
}
