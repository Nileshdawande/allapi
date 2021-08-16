<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Lead_source_categorie extends Model
{


    protected $fillable = [
        'category'
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
