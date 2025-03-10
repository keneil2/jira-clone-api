<?php

use App\Http\Controllers\Api\Project\projectController;
use App\Http\Controllers\Api\user\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Workspace\ProjectTemplateController;
use App\Http\Controllers\Workspace\WorkspaceController;
use App\Http\Controllers\Workspace\WorkspaceTemplateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::get("/",function(){
    return response()->json("Jira_Clone_api");
});

Route::middleware(['auth:sanctum'])->get('/authCheck', function (Request $request) {
    return auth()->check();
});

Route::post("login",[AuthController::class,"login"]);
Route::post("register",[AuthController::class,"register"]);
Route::get("home",[HomeController::class,'index'])->middleware('auth:sanctum')->name("home");


Route::middleware(["auth:sanctum"])->group(function(){
Route::get('/check-workspace',[UserController::class,"userCreatedWorkspace"]);
Route::get("project-templates/all",[ ProjectTemplateController::class,"all"]); 
Route::post('create-project',[projectController::class,"create"]);
Route::post('create-workspace',[WorkspaceController::class,"create"]);
Route::get("/user-projects",[projectController::class,"getUserProject"]);
});

