<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function project(){
     return   $this->hasMany(Project::class);
    }
}
