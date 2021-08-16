<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Lead_rank extends Model 
{
    
    protected $fillable = [
        'status'
    ];


    protected $hidden = [
        'password',
    ];
}
