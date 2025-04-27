<?php

namespace App\Http\Controllers\Api\Team;

use App\Http\Controllers\Controller;
use App\Http\Response\ApiResponse;
use App\Models\Role;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use AppendIterator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TeamController extends Controller
{
    public function createTeam(Request $request){
        Log::debug("Team request",$request->toArray());
   $data= $request->validate([
        "name"=>"string|required",
        "users.*"=>"string|required",
        "workspace_id"=>"required|integer",
        "roles.*"=>"string|required",
    ]);

    $teamMembers=$data["users"];
    $teamName=$data["name"];

    // create the team
      $team = Team::create([
        "name"=>$teamName,
        "team_owner"=>auth()->user()->id,
        "workspace_id"=>$data["workspace_id"],

      ])->toArray();

      // create team users
      if(count($data["users"]) > 0){
        foreach($teamMembers as $index => $member){
            // get user id
            $user_id=User::where("name","=",$member)->get()->toArray();
            // get role id
            $role_id=Role::where("name","=",$data["roles"][$index])->get()->toArray();
            Log::debug($user_id);
            TeamUser::create([
                "team_id"=>$team['id'],
                "user_id"=>$user_id[0]['id'],
                "role_id"=>$role_id[0]['id']
            ]);
        }
        return ApiResponse::created([],"team and users added sucessfully");
      }
    }

    public function getTeams($workspace_id){
         $teams=Team::where("workspace_id","=",$workspace_id)->get()->toArray();

         return ApiResponse::ok($teams,"teams fetched succesfully");
    }

    public function addUser($request){
     $request->validate([
      "user_id"=>"integer|required",
      "role"=>"string|required",
      "project_id"=>"integer|nullable",
      "team_id"=>"integer|nullable"
     ]);

     // next add the user to the Teams table
     // check if user should go to team or project

     if($request->team_id){
  // to implement
     }else if($request->team_id==null){
       validator()->failed();
       // throw validator failed error with some messgaes
     }
     
     if($request->project_id){
// to implement
     }else if($request->project_id){
 // throw validator failed error with some messgaes
     }
    }
}
