<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Lead_source extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lead_source_name',
        'lead_source_parent'
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
