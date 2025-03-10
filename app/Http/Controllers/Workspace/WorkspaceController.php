<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use Illuminate\Http\Request;

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
}
