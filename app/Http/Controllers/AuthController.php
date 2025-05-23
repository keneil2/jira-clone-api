<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * register a user
     */
    public function register(Request $request)
    { 
        $request->validate([
            'name'=>"required|min:5|unique:users,name|alpha_dash|unique:users,name",
            'email' => "email|required|unique:users,email",
            "password" => "required|string|regex:/^[a-zA-z0-9]+[\*\!\?%]*$/|min:5|confirmed"
        ]);
          $mention_slug= "@". Str::slug(str_replace(" ","_",$request->name));
        $user=User::create([
            'name'=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password,
            "mention_slug"=> $mention_slug,
        ]);

        $token=$user->createToken('authToken')->plainTextToken;
        return [
            "user"=>$user,
            "token"=>$token
        ];
    }

    /**
     * authenticate a user
     */
    public function login(Request $request)
    {
        $request->validate([
            "email" => "email|exists:users|required",
            'password' => "string|required"
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json("incorrect email or password");
        }
       $token= auth()->user()->createToken("authToken")->plainTextToken;
        return [
            "user"=> auth()->user(),
            "token"=>$token,
            "data" =>[
              "has_workspace"=> \App\Services\UserService::userCreatedWorkSpace()
            ]
        ];
    }

    


}
