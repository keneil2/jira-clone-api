<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable=[
        "feature_name",
        "sidebar_section_id"
    ];
    public function section(){
       return $this->belongsTo(SidebarSection::class,"sidebar_section_id");
    }
}
