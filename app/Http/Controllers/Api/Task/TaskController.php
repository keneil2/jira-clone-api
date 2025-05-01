<?php

namespace App\Http\Controllers\Api\Task;

use App\Http\Controllers\Controller;
use App\Http\Response\ApiResponse;
use App\Models\Task;
use App\Models\TaskType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
      /**
     * create Task for user
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function create($projectID,Request $request){
        $validatedData=$request->validate([
    "description"=>["string"],
    "priority"=>["required","string"],
    "asingee"=>["required","integer","exist:users,id"],
    "name"=>["required","string","max:250"],
    "reference_no"=>"string|nullable"
    ],[
        "asignee.exist"=>"this user does not exist in our system"
    ]);
     
    try {
        DB::beginTransaction();
        $task=Task::create([
            "name"=>$validatedData["name"],
            "priority"=>$validatedData["priority"],
             "asignee_id"=>$validatedData["asingee"],
             "project_id"=>$projectID
        ]);
        DB::commit(); 
        //code...
    } catch (\Exception $exception) {
        Log::error($exception->getMessage());
        DB::rollBack();
    }
        }

        public function getTaskTypes(){
            try{
  $taskTypes=TaskType::all()->toArray();
          return ApiResponse::ok($taskTypes);
            }catch(\Exception $e){
    Log::error($e->getMessage());
            }
         
        }
}
