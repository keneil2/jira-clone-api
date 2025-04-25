<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    protected $fillable = [
        "name",
        "project_template_id",
        "description",
        "workspace_id"
    ];
    public function user(){
   return $this->hasMany(ProjectUser::class)->with("users");
    }

    public function template(){
        return $this->belongsTo(ProjectTemplate::class,'project_template_id')->with(["templatefeatures"]);
    }
    
}
