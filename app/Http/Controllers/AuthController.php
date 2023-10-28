<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
Use Session;

class AuthController extends Controller
{
    public function register(Request $req){

 //Validation of the user input data 
$rules = [
    'name'=> 'required',
    'email'=> 'required|unique:users',
    'password'=> 'required|min:6',
];

$validator = Validator::make($req->all(), $rules);

if($validator->fails()){
    return response()->json($validator->errors(), 400);
}
//create a user in users table 
$user =  User::create([
    'name'=>$req->name,
    'email'=>$req->email,
    'password'=>Hash::make($req->password),
]);

$token = $user->createToken('Individual access token')->plainTextToken;
$tank =  DB::table('tank')->where('user_id', $user->id)->pluck('id');
$response = ['success'=>true,'user'=>$user, 'token'=>$token ];
return response()->json($response , 200);

    }

    public function registerAdmin(Request $req){

        //Validation of the user input data 
       $rules = [
           'name'=> 'required',
           'email'=> 'required|unique:users',
           'password'=> 'required|min:6',
       ];
       
       $validator = Validator::make($req->all(), $rules);
       
       if($validator->fails()){
           return response()->json($validator->errors(), 400);
       }
       //create a user in users table 
       $user =  Admin::create([
           'name'=>$req->name,
           'email'=>$req->email,
           'password'=>Hash::make($req->password),
       ]);
       
       $token = $user->createToken('Individual access token')->plainTextToken;
       return redirect()->route('dashboard');
       
           }


    public function login(Request  $req){
//Define the rules and validate the user inputs
        $rules =[
            'email'=>'required',
            'password'=>'required',
        ];

        $validator = Validator::make($req->all(), $rules);
//Find the user email in the users table
        $user  = User::where('email',$req->email)->first();
//check the user email and its password
if($user && Hash::check($req->password, $user->password)){
    $token = $user->createToken('Individual access token')->plainTextToken;

    $tank =  DB::table('tank')->where('user_id', $user->id)->pluck('id');

$response =  ['success'=>true,'user'=>$user ,'token'=> $token,'tank_id'=>$tank[0]];

return response()->json($response , 200);

}

//else if the credentials entered are not correct
else {
$response = ['success'=>false,'message'=>'incorrect email or password'];
return response()->json($response , 200);
}



    }

    public function FormLogin(Request  $req){
        //Define the rules and validate the user inputs
                $rules =[
                    'email'=>'required',
                    'password'=>'required',
                ];
        
                $validator = Validator::make($req->all(), $rules);
        //Find the user email in the users table
               $user  = Admin::where('email',$req->email)->first();
                //user  = users::where('email',$req->email)->first();
        //check the user email and its password
        if($user && Hash::check($req->password, $user->password)){
            $token = $user->createToken('Individual access token')->plainTextToken;
        $response =  ['user'=>$user ,'token'=> $token];
        $name = $user->name;
        // $req->session()->put('loginId',$user->id);
        return redirect()->route('dashboard')->with( ['name' => $name] );
        
        }
        
        // else if the credentials entered are not correct
        else {
        $response = ['message'=>'incorrect email or password'];
        return redirect()->route('home');
        }
        
        
        
            }
           
   

    public function logout(){
        auth()->logout();
        return redirect()->route('home');
        
    }


    public function Apilogout(){
        auth()->logout();
        return response()->json("Logged out successfully");
        
    }
}
