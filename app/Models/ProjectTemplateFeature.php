<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTemplateFeature extends Model
{
    protected $fillable = [
        "workspace_template_id",
        "feature_id"
    ];
}
