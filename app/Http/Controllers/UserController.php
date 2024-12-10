<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


    public function loginPage(){
        try{
            return view("pages.auth.loginPage");
        }catch(Exception $ex){
            return response()->json(["status" => "fail", "message"=> $ex->getMessage()]);
        }
    }

    public function registrationPage(){
        try{
            return view("pages.auth.registrationPage");
        }catch(Exception $ex){
            return response()->json(["status" => "fail", "message"=> $ex->getMessage()]);
        }
    }




    public function registration(Request $request){
        try{
        //    $request->validate([
        //     "name" => "required|string|max:255",
        //     "email" => "required|email|unique:users,email",
        //     "mobile" => "required|digits:11|unique:users,mobile",
        //     "password" => "required|string|min:8|confirmed",
        //    ]);

        $validator = Validator::make($request->all(), [
           "name" => "required|string|max:255",
           "email" => "required|email|unique:users,email",
           "mobile" => "required|digits:11|unique:users,mobile",
           "password" => "required|string|min:8|confirmed",
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "error", "errors"=>$validator->errors()]) ;               
        }




           User::create([
            "name" => Str::upper(trim($request->name)),
            "email" => Str::lower(trim($request->email)),
            "mobile" => trim($request->mobile),
            "password" => Hash::make(trim($request->password)),
           ]);
           
           return response()->json(["status" => "success", "message" => "login Successfully"]);
        }catch(ValidationException $ex){
            return response()->josn(["status" => "error", "errors" => $ex->errors()]);
        }
        catch(Exception $ex){
            return response()->json(["status" => "fail", "message"=>$ex->getMessage()]);
        }
    }


    public function login(Request $request){
        try{
            return "im login";
        }catch(Exception $ex){
            return response()->json(["status" => "fail", "message"=>$ex->getMessage()]);
        }
    }
}
