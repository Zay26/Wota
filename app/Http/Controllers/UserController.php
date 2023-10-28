<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Tank;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $users= User::paginate(10);
    //    dd($users);
        return view('users.user_index',compact('users'));
    }

    public function index2()
    {

       $master= Admin::paginate(10);
    //    dd($users);
        return view('users.master_index',compact('master'));
    }


public function userReg(){
    return view('users.user_reg');
}
public function adminReg(){
    return view('users.adminreg');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response


     */
    public function store(Request $req)
    {
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
        
        $response = ['user'=>$user, 'token'=>$token];
        return response()->json($response , 200);
    }

    public function create(Request $req)
    {
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
        $users =  User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>Hash::make($req->password),
        ]);
        
        $token = $users->createToken('Individual access token')->plainTextToken;
        
        // $response = ['user'=>$user, 'token'=>$token];
       return redirect()->route('userReg');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = User::find(2)->tank()->where('radius',80)->first();
        $response = ['user'=>$user];
        return response()->json($response,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
//     public function edit(Request $request, $id)
//     {
//         $tanks = Tank::get();
// $user = User::find($id);

// return view('users.user_edit',compact('tanks','user'));


//     }
    public function edit($id)
    {
        $users = User::find($id);
    return view('Users.user_edit',compact('users'));

    }


    public function updateUser(Request $request,$id)
    {
       
        $input =$request->all();
$user = User::find($id);
$user->company = $input['name'];
$user->height = $input['email'];
$user->radius = $input['password'];
$user->save();


return redirect('/users');
    }

       

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect()->back();
    }

public function data($id){
    $user =  User::get();
  
   $real_time = 0;
   $bucket =0;
  
 
    $no_user = count($user)-1;
    $tank = Tank::get();
    $no_tank = count($tank);
 

  $tankerd = Tank::find($id);
  $tankcapacity= $tankerd->capacity;
    $bigbucket = 20;
$tank_id=$id;

    $realtime_data = array();
    $datas =  DB::table('data')->where('tank_id',$tank_id)->whereDay('created_at', '=', now())->get();
    $tank_per =0;
    foreach($datas as $data){
$real_time= $data->remaining_volume;

if($real_time==null){
    $real_time = 0;
    
}
$bucket = $real_time /$bigbucket;
if($bucket==null){
    $bucket =0;
}
$tank_per =  ($real_time/$tankcapacity )*100;
    }
   
  
  
 $tank_data= Tank::get()->all();

 Session::put('tank_id', $id);
  
    return view("Tanks.tank_visuals", compact('no_user','no_tank','user','tank_per','real_time','bucket','tank_data','tank_id'));
}



public function dashboardData(Request $request ){


    $users_array = array();
    $user =  User::get()->where("name",'!=','Admin');
    foreach($user as $user){
        $id = $user->id;
        //This method is used to get a pure array
        array_push( $users_array,$user->name);
        
        }
    // $datas =  DB::table('data')->where('tank_id', $tank_id)->whereDay('created_at', '=', now())->get();
    $leo =  DB::table('users')->whereDay('created_at','=',now())->whereMonth('created_at','=',now())->get();
    $today =  DB::table('users')->whereDay('created_at','=',now())->whereMonth('created_at','=',now())->paginate(10);
   $real_time = 0;
   $bucket =0;
   
 
    $no_user = count($users_array)-1;
    $no_user_today = count($leo);
    
    $tanks = Tank::paginate(5);
    $tankers = Tank::all();
    $no_tank = count($tankers);
  foreach($tanks as $tank){
      $tankcapacity = $tank->capacity;
  }
 $name= Session::get('name');

//   Session::put('tank_id', );



  
    return view("/dashboard", compact('no_user','no_tank','no_user_today','today','tanks','users_array','name'));
}

}
