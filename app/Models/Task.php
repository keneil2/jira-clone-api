<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=[
"name",
 "priority",
 "assignee_id" ,
"project_id" ,
"reference_no",// to be implemented
 "task_type_id",
 "description",
 'due_date'
    ];
}
