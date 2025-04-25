<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTemplateFeature extends Model
{
    protected $fillable = [
        "project_template_id",
        "feature_id"
    ];

    public function feature(){
   return  $this->belongsTo(Feature::class,"feature_id")->with("section");
    }
    public function template(){
        return $this->hasMany(ProjectTemplate::class); 
        }
}
