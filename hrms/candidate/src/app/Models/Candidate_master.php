<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Candidate_master extends Model
{


    protected $fillable = [
        'candidate_firstname',
        'candidate_lastname',
        'candidate_middlename',
        'candidate_first_address',
        'candidate_second_address',
        'candidate_third_address',
        'pincode',
        'city',
        'state',
        'country',
        'candidate_dob',
        'candidate_qual_one',
        'qual_one_details',
        'candidate_qual_two',
        'qual_two_details',
        'primary_contact',
        'secondary_contact',
        'job_type',
        'candidate_reg_date',
        'last_salary',
        'candidate_email',
        'candidate_linkedin_profile',
        'technology_id'
    ];


    protected $hidden = [
        'password',
    ];
}
