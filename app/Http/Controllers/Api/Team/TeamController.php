<?php

namespace App\Http\Controllers\Api\Team;

use App\Http\Controllers\Controller;
use App\Http\Response\ApiResponse;
use App\Models\ProjectUser;
use App\Models\Role;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use AppendIterator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class TeamController extends Controller
{
  public function createTeam(Request $request)
  {
    Log::debug("Team request", $request->toArray());
    $data = $request->validate([
      "name" => "string|required",
      "users.*" => "string|required",
      "workspace_id" => "required|integer",
      "roles.*" => "string|required",
    ]);

    $teamMembers = $data["users"];
    $teamName = $data["name"];

    // create the team
    $team = Team::create([
      "name" => $teamName,
      "team_owner" => auth()->user()->id,
      "workspace_id" => $data["workspace_id"],

    ])->toArray();

    // create team users
    if (count($data["users"]) > 0) {
      foreach ($teamMembers as $index => $member) {
        // get user id
        $user_id = User::where("name", "=", $member)->get()->toArray();
        // get role id
        $role_id = Role::where("name", "=", $data["roles"][$index])->get()->toArray();
        Log::debug($user_id);
        TeamUser::create([
          "team_id" => $team['id'],
          "user_id" => $user_id[0]['id'],
          "role_id" => $role_id[0]['id']
        ]);
      }
      return ApiResponse::created([], "team and users added sucessfully");
    }
  }

  public function getTeams($workspace_id)
  {
    $teams = Team::where("workspace_id", "=", $workspace_id)->get()->toArray();

    return ApiResponse::ok($teams, "teams fetched succesfully");
  }

  public function addUser(Request $request)
  {
    $request->validate([
      "user_id" => "integer|required",
      "role_id" => "integer|required",
      "project_id" => "integer|nullable",
      "team_id" => "integer|nullable"
    ],[
      "user_id.unique"=>"this user is already apart of this project",
    ]);
    if ($request->team_id == null && $request->project_id == null) {
      // throw validator failed error with some messgaes
      throw ValidationException::withMessages([
        "project_id" => ["Select at least one place to add this user"]
      ]);
    }
    $projectFound=ProjectUser::where("user_id",$request->user_id)->where("project_id",$request->project_id)->exists();
       
    if($projectFound && $request->team_id == null){
      throw ValidationException::withMessages([
        "project_id" => ["user already exist in this project"]
      ]);
    }
    $teamFound=TeamUser::where("user_id",$request->user_id)->where("team_id",$request->team_id)->exists();
    if( $teamFound && $request->project_id == null){
      throw ValidationException::withMessages([
        "project_id" => ["user already exist in this team"]
      ]);
    }
    try {


      // next add the user to the Teams table
      // check if user should go to team or project
      DB::beginTransaction();
      if ($request->team_id) {
        // to implement
        $team = TeamUser::create([
          "team_id" => $request->team_id,
          "role_id" => $request->role_id,
          "user_id" => $request->user_id
        ]);
      }

      if ($request->project_id) {
        // to implement
        $project=ProjectUser::create([
          "project_id" => $request->project_id,
          "user_id" => $request->user_id,
        ]);
      }
   

      DB::commit(); 
      return  ApiResponse::ok($project?->toArray() ??  $team?->toArray(),"created Succefully");
    } catch (\Exception $e) {
      Log::error($e);
      DB::rollBack();
     return  ApiResponse::serverError();
    }

  }
}
