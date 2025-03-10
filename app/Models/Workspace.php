<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    protected $fillable=[
  "name",
  "project_template_id",
  "description",
  "user_id"
  
    ];
}
