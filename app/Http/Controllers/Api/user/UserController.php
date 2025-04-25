<?php

namespace App\Http\Controllers\Api\user;

use App\Http\Controllers\Controller;
use App\Http\Response\ApiResponse;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function userCreatedWorkSpace(){

        $userId=auth()->user()->id;

        $workspace=Workspace::where("user_id",$userId)->get();

        if($workspace->isEmpty()){
           return false;
        }
        return true;
    }
    public function getUsersByMention(Request $request){
        try {
         // getting the query
        $query=$request->query("handle");
        if($query){
$users =User::where("mention_slug","LIKE",$query."%")->get()->toArray();
return ApiResponse::ok($users,"Users retrived Successfully");
        }
        } catch (\Exception $th) {
            Log::debug($th);
            ApiResponse::serverError();
        }
       

        // Validator::make($mention_slug,[
             
        // ]);
        // 
    }
}
