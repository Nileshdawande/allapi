<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Lead extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lead_received_date',
        'lead_source_id',
        'lead_cat_id',
        'lead_weight',
        'domestic',
        'offshore',
        'lead_details',
        'interaction_id',
        'budget',
        'currency',
        'company_id',
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
