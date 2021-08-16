<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_task_id',
        'project_id',
        'type_id',
        'status_id',
        'summary',
        'description',
        'assignee',
        'start_date',
        'end_date',
        'priority',
        'created_by',
        'updated_by',
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
