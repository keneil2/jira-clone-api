<?php

namespace App\Http\Controllers\Api\Task;

use App\Http\Controllers\Controller;
use App\Http\Response\ApiResponse;
use App\Models\Project;
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
    public function create($projectID, Request $request)
    {
        $validatedData = $request->validate([
            "description" => ["string"],
            "priority" => ["required", "string"],
            "asingee" => ["required", "integer", "exists:users,id"],
            "name" => ["required", "string", "max:250"],
            "reference_no" => "string|nullable",
            "taskType"=>["required", "integer"],
            "date"=>["date","required"]
        ], [
            "asignee.exist" => "this user does not exist in our system"
        ]);
      if($validatedData["reference_no"]==null){
          $reference_no =$this->generateReferenceNo($validatedData["taskType"],$projectID);
      }else{
        $reference_no = $validatedData["reference_no"];
      }
      
        try {
            $dateTime=date("Y-m-d H:i:s",strtotime($validatedData["date"]));
            DB::beginTransaction();
            $task = Task::create([
                "name" => $validatedData["name"],
                "priority" => $validatedData["priority"],
                "assignee_id" => $validatedData["asingee"],
                "project_id" => $projectID,
                "reference_no"=>$reference_no,// to be implemented
                "task_type_id"=> $validatedData["taskType"],// to be implemented
                "description"=> $validatedData["description"],
                'due_date'=> $dateTime
            ]);
            DB::commit();
            $task = $task?->toArray();
            return ApiResponse::ok( $task,"task created successfully");
            //code...
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollBack();
            return ApiResponse::serverError(message:$exception->getMessage());
        }
    }

    public function getTaskTypes()
    {
        try {
            $taskTypes = TaskType::all()->toArray();
            return ApiResponse::ok($taskTypes,"Tasks types retrived successfully");
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

    }

    public function generateReferenceNo($task_type,$project_id){
        // get task_type prefix and generate task based on that
           // need to account for concurrency issues so what to do hmm
           // okay here is the plan were going to check the database if the task_reference_no exist if it does we retry and this can be do 5 times
           $exist=true;
           $refNo=null;
           $taskType=TaskType::where("id",$task_type)->first();
           $project=Project::where("id",$project_id)->first();
           $retries=0;

           while($exist && $retries <= 10){
            $retries++;
            // generate our reference no 
           $refNo="{$taskType->name}_{$project->name}_".mt_rand();
              // check if the reference no exist first 
              $exist=Task::where("reference_no",$refNo)->exists();   
           }
        return $refNo;
    }
}
