<?php

namespace App\Http\Controllers\Api\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectUser;
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

        return response()->json([
            "success_message" => "Project Created Successfully"
        ]);
    }


  /**
   * as the name suggest get the users project
   * @return array
   */
  public function getUserProject(){
    // get workspace_id
    $workspace = Workspace::where("user_id",auth()->user()->id)->get("id");
   Log::debug("workspace Id: $workspace");
     $userProject = Project::with("user")->where("workspace_id",$workspace[0]["id"])->get();
     return response()->json([
 "projects" => $userProject,
 "message" => "project retrived successfully"
     ]);
  }

  public function getProjectById($projectID){
    $project =Project::with("template")->where("id",$projectID)->get();
    if($project->isEmpty()){
     return response(404)->json([
        "message"=>"project not found"
     ]);
    }
    return response()->json([
        "project"=>$project,
        "message"=>"project retrieved successfully"
    ]);
  }



  /**
   * get users that belong to a project
   * @return 
   */
  public function getUsers($project_id){
    $members = ProjectUser::where("Project_id",$project_id)->get();
    return response()->json([
        "project"=>$members,
        "message"=>"members fetch successFully"
    ]);
  }
}
