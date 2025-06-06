<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    protected $fillable=[
        'project_id',
        "user_id"
    ];


    public function users(){
        return $this->belongsTo(User::class,"user_id");
    }
    public function project(){
     return   $this->hasMany(Project::class);
    }
}
