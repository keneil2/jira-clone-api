<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkspaceUser extends Model
{
    public function users(){
        $this->hasMany(User::class);
    }
}
