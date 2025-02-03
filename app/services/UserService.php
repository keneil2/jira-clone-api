<?php 
namespace App\Services;

use App\Models\Workspace;
 trait UserService{
  static  public function userCreatedWorkSpace(){

        $userId=auth()->user()->id;

        $workspace=Workspace::where("user_id",$userId)->get();
// dd();
        if($workspace->isEmpty()){
           return false;
        }
        return true;
    }
 }