<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use App\Models\WorkspaceUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkspaceController extends Controller
{
    public function create(Request $request){
      $request->validate([
        "workspace_name"=>['string','required'],
          'description'=>["string","nullable"],
      ]);

      $newWorkSpace = Workspace::create([ 
        "name"=>$request->workspace_name,
        "user_id"=>auth()->user()->id,
        'description'=>$request->description,
      ]);
      
     return [
      "workspace"=>$newWorkSpace
     ];
    }


    public function getWorkspaceUsers( $workspace_id){
         if(is_integer($workspace_id)){
        $workspaceUsers = WorkspaceUser::with("users")->where("workspace_id","=",$workspace_id)->get();
         }
    }
}
