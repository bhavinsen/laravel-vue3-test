<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function index(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required | email',
                'password' => 'required',
            ]);
            if ($validator->fails()) {

                return response()->json(['error' => $validator->errors()], 401);
            }
            if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
                $user = Auth::user();
                $user_id = $user->id;
                $email = $user->email;
                $name = $user->name;
                $token =  $user->remember_token;
                return response()->json(['Message' => "Login successfull","name"=>$name, "user_id" => $user_id , "token" => $token, "email" => $email,"status" => 200], 200);
            } else {
                return response()->json(['message' => 'Unauthorised'], 401);
            }
            
        } catch (\Throwable $th) {
            return response()->json(['error' =>'Unauthorised'.$th], 401);
        }
    }
}
