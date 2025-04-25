<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\ProjectUser;
use Illuminate\Http\Request;

class ProjectUsersControllers extends Controller
{
    public function getUser($projectId){
        $users=ProjectUser::where("project_id",$projectId)->get();

        return response()->json($users);
    }
}
