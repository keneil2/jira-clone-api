<?php

use App\Http\Controllers\Api\Project\projectController;
use App\Http\Controllers\Api\user\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::get("/",function(){
    return response()->json("Jira_Clone_api");
});

Route::post("login",[AuthController::class,"login"]);
Route::post("register",[AuthController::class,"register"]);
Route::get("home",[HomeController::class,'index'])->middleware('auth:sanctum')->name("home");


Route::middleware(["auth:sanctum"])->group(function(){
Route::get('/check-workspace',[UserController::class,"userCreatedWorkspace"]); 
Route::post('create-workspace',[]);
});

