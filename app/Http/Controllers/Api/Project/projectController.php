<?php

namespace App\Http\Controllers\Api\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class projectController extends Controller
{
    // checking if the user created a project controller
    public function userCreatedWorkSpace()
    {

        $userId = auth()->user()->id;

        $workspace = Workspace::where("user_id", $userId)->get();
        // dd();
        if ($workspace->isEmpty()) {
            return false;
        }
        return true;
    }

    /**
     *  create the project 
     * @param \Illuminate\Http\Request $request
     * @return array{success_message: string}
     */
    public function create(Request $request)
    {
        $request->validate([
            "name" => 'required|string',
            'project_template_id' => "integer|required",
            "description" => "nullable|string",
            "workspace_id"=>"required|integer"
        ]);

        Project::create([
            "name" => $request->name,
            "project_template_id" => $request->project_template_id,
            "description" => $request->description,
            "workspace_id"=>$request->workspace_id
        ]);

        return [
            "success_message" => "Project Created Successfully"
        ];
    }


  /**
   * as the name suggest get the users project
   * @return array
   */
  public function getUserProject(){
    // get workspace_id
    $workspace = Workspace::where("user_id",auth()->user()->id)->get("id");
   Log::debug("workspace Id: $workspace");
     $userProject = Project::all()->where("workspace_id",$workspace[0]["id"]);
     return [
"projects"=> $userProject,
 
"message"=>"project retrived successfully"
     ];
  }
}
