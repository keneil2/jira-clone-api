<?php

namespace App\Http\Controllers\Api\user;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userCreatedWorkSpace(){

        $userId=auth()->user()->id;

        $workspace=Workspace::where("user_id",$userId)->get();

        if($workspace->isEmpty()){
           return false;
        }
        return true;
    }
}
