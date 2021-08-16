<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Recruitment extends Model
{

    protected $fillable = [
        'recruitment_type_name'
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
