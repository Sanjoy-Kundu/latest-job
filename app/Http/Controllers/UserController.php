<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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




    public function login(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                "email_or_mobile" => "required|max:225",
                "password" => "required|string|min:8",
            ]);
            if($validator->fails()){
                return response()->json(["status" => "error", "errors" => $validator->errors()]);
            }
            
            $fieldType = filter_var($request->email_or_mobile, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
            $user = User::where($fieldType, $request->email_or_mobile)->first();

            $email_or_mobile = trim($request->email_or_mobile);
            $password = trim($request->password);
            
            if(!$user){
                return response()->json(["status" => "error", "message" => "email or phone does not exists"]);
            }

            if(!Hash::check($password, $user->password)){
                return response()->json(["status" => "error", "message"=>"Password does't exists"]);
            }
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(["status" => "success", "message" => "User Login Sucessfully", "token" => $token, "role" => $user->role]);
        }catch(Exception $ex){
            return response()->json(["status" => "fail", "message"=> $ex->getMessage()]);
        }
    }




    public function registration(Request $request){
        try{
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









    public function dashboard(Request $request)
    {
        try{
         // You can return the dashboard view or some data here
         if(Auth::check()){
          return "Dashbord";
         }
         return redirect()->route('login');
       

        }catch(Exception $ex){
            return response()->json(["status" => "fail", "message" => $ex->getMessage()]);
        }
    }
}
