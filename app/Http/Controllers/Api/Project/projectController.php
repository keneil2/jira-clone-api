<?php

namespace App\Http\Controllers\Api\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Workspace;
use Illuminate\Http\Request;

class projectController extends Controller
{
    // checking if the user created a project controller
    public function userCreatedWorkSpace(){

        $userId=auth()->user()->id;

        $workspace=Workspace::where("user_id",$userId)->get();
// dd();
        if($workspace->isEmpty()){
           return false;
        }
        return true;
    }
}
