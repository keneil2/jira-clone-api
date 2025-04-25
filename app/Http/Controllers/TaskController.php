<?php

namespace App\Http\Controllers;

use App\Models\Task;
use GuzzleHttp\Promise\Create;
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
    public function create(Request $request){
    $validatedData=$request->validate([
"description"=>["string"],
"priority"=>["required","string"],
"asingee"=>["required","integer","exist:users,id"],
"name"=>["required","string","max:250"],
"reference_no"=>"string"
]);
 
try {
    DB::beginTransaction();
    $task=Task::create([
        "name"=>$validatedData["name"],
        "priority"=>$validatedData["name"],
         "asingee"=>$validatedData["name"],
    ]);
    //code...
} catch (\Exception $exception) {
    Log::error($exception->getMessage());
    DB::rollBack();
}
    }
}
