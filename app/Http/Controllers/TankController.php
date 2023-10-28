<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tank;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Http;

class TankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

        $users_array = array();
        $users =User::all()->where("name",'!=','Admin');;

foreach($users as $user){
$id = $user->id;
//This method is used to get a pure array
array_push( $users_array,$user->name);
  
}

        // $tanks = Tank::all();
        $tanks =  DB::table('tank')->paginate();
    
      
//    return $users_array;
        return view('Tanks.tank_index',compact('tanks','users_array'));
    }
    //for Api
    public function tankdata()
    {
        $response = Tank::all();
        return response()->json($response, 200);
    }

    public function form()
    {
        $users = User::get();
    
        return view('Tanks.tank_reg',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//         $response = Http::get('https://api.thingspeak.com/channels/1626829/feeds.json?api_key=A02S4WYULQYF2CLO');
// $data = array( $response->json("feeds"));

        // dd($request->all());
   $tank = new Tank();
   $tank->user_id = $request->user_id;
   $tank->company = $request->company;
   $tank->height=$request->height;
   $tank->radius=$request->radius;
   $tank->capacity= $request->capacity;
   $tank->current_volume =3.14*($request->radius*$request->radius)*($request->height);
   $tank->save();
         return redirect("/tank");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::get();
    $tank =  Tank::find($id);
    return view('Tanks.tank_edit',compact('users','tank'));

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
       
        $input =$request->all();
$tank = Tank::find($id);
$tank->company = $input['company'];
$tank->height = $input['height'];
$tank->radius = $input['radius'];
$tank->capacity = $input['capacity'];
$tank->user_id = $input['user_id'];
$tank->save();


return redirect('/tank');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $result= Tank::find($id)->delete();
if($result){
    return redirect()->back();
}


   
    }



public function store_api(Request $request)
{
//         $response = Http::get('https://api.thingspeak.com/channels/1626829/feeds.json?api_key=A02S4WYULQYF2CLO');
// $data = array( $response->json("feeds"));

    // dd($request->all());
$tank = new Tank();
$tank->user_id = $request->user_id;
$tank->company = $request->company;
$tank->height=$request->height;
$tank->radius=$request->radius;
$tank->capacity= $request->capacity;
$tank->current_volume =3.14*($request->radius*$request->radius)*($request->height);
$tank->save();
if($tank!=null){
    $response =  ['success'=>true,'tank'=>$tank];
    return response()->json($response, 200);
}else {
    $response =  ['success'=>false,'message'=>"check your data"];
    return response()->json($response, 200);
}

   
}
}
