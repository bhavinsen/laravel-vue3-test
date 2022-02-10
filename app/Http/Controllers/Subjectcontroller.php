<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSubject;
use App\Models\Subject;
use Illuminate\Support\Facades\Validator;

class Subjectcontroller extends Controller
{
    public function index(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {

                return response()->json(['error' => $validator->errors()], 401);
            }
            
            $Subject = new Subject;
            $Subject->name=$request->name;
            $Subject->save();

            $UserSubject = new UserSubject;
            $UserSubject->subject_id=$Subject->id;
            $UserSubject->user_id=$request->user_id;
            $UserSubject->save();

            if($UserSubject){
                return response()->json(['message' => 'Subject data added successfully',"status" => 200], 200);
            }else {
                return response()->json(['message' => 'Subject data not added'], 401);
            }
            
        } catch (\Throwable $th) {
            return response()->json(['error' =>'something went wrong'.$th], 401);
        }
    }

    public function get($id){
        $post = UserSubject::with('subjects')->where('user_id',$id)->get();
        if(!empty($post)){
            $subject=[];
            foreach ($post as $key => $value) {
                array_push($subject,$value->subjects);
            }
        }
 
        // $image = $post->subjectdata();
        if($subject){
            return response()->json(['message' => $subject,"status" => 200], 200);
        }else {
            return response()->json(['message' => 'Subject data not added'], 401);
        }
    }
}
