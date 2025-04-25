<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTemplate extends Model
{
  public function  templatefeatures(){
    return $this->hasMany(ProjectTemplateFeature::class)->with("feature");
  }
}
