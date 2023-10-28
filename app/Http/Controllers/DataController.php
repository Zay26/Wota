<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Data;
use App\Models\Tank;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use App\Charts\TankChart;
use DateTime;

class DataController extends Controller
{
    //to fetch daily data 



//     public function fetchdatahere( $val  ){
     
//         $tank_id = 12;
//       $level= $val;
//       $real_level = $level/100;
     
//         $height =  DB::table('tank')->where('id',$tank_id)->value('height');
//         $radius =  DB::table('tank')->where('id',$tank_id)->value('radius');
//         $capacity =  DB::table('tank')->where('id',$tank_id)->value('capacity');
//         // $height = Tank::find($tank_id)->height;
//         // $radius = Tank::find($tank_id)->radius; 
// $depth = $height-$real_level;
// $re_volume= 3.14*($radius*$radius)*$depth;
// $us_volume = $capacity - $re_volume;

// $response = DB::table('data')->insert([
//     'tank_id' => $tank_id,
//     'remaining_volume' => $re_volume,
//     'used_volume'=>$us_volume,
//     'created_at'=>Carbon::now(),
//     'Updated_at'=>Carbon::now(),
// ]);
//         return response()->json(200 , 'successful');
      
//         }
public function fetchdatahere(Request $req ){
   $data = $req->all();

   $newval =(int) $data['newval'];
   $newval =round($newval);
   $newvals =(int) $data['newval'];
        $tank_id = 12;
     //data in metres
      $newval = $newval/100;
      $height = Tank::find($tank_id)->height;
   $fill=   $height - $newval;
      
        $radius =  DB::table('tank')->where('id',$tank_id)->value('radius');
        // $capacity =  DB::table('tank')->where('id',$tank_id)->value('capacity');
      
        // $radius = Tank::find($tank_id)->radius; 
$re_volume= 3.14*($radius*$radius)*$fill;
$re_volume = $re_volume*1000; 

$used_volume =  3.14*($radius*$radius)*$newval;
$used_volume = $used_volume*1000;

//This is the previous used volume 
$used_level_data = DB::table('data')->where('tank_id',$tank_id)->latest('created_at')->first();
$level_value = $used_level_data->level;
$used_volume_data = DB::table('data')->where('tank_id',$tank_id)->latest('created_at')->first();
$used_value = $used_volume_data->remaining_volume;

$diff1 =round($level_value - $newvals);
$diff2 =round($newvals- $level_value);



if($newvals>$level_value && $diff2>2 ){
    $new_used_volume =  $used_value-$re_volume;
    Data::insert([
        'tank_id' => $tank_id,
        'remaining_volume' => $re_volume,
        'used_volume'=>$new_used_volume ,
        'level'=>$newvals,
        'created_at'=>Carbon::now(),
        'Updated_at'=>Carbon::now(),
    ]);
}
// else if($newvals<$level_value && $diff2>2) {
//    $new_used_volume= $used_value-$used_volume;
// Data::insert([
//     'tank_id' => $tank_id,
//     'remaining_volume' => $re_volume,
//     'used_volume'=>$new_used_volume ,
//     'level'=>$newvals,
//     'created_at'=>Carbon::now(),
//     'Updated_at'=>Carbon::now(),
// ]);
// }






        



}



// public function fetcher(){
  
//     $used_volume_data = DB::table('data')->where('tank_id',12)->latest('created_at')->first();

//     $data = 47.6;
//     $data3 = 47.7;
//     $rangwe= range($data,$data3,3);
   
//     return $rangwe;
// }



    public function usedWaterDaily($id){
        $realtime_data = array();
        $tank_id=$id;
        $datas =  DB::table('data')->where('tank_id', $tank_id)->whereDay('created_at', '=', now())->whereDay('created_at', '=', now())->get;
       
        foreach($datas as $data){
        
   $real_time= $data->remaining_volume;
        }
        $realtime_data['data'] = $real_time;
        return  $realtime_data;
        // return redirect('/dashboard'  ,compact('real_time'));

    }
/////here

public function data2(){
   $dataz= array();
   $monthdata = array();
    $monthdatasum_array =  array();
    $monthname_array=  array();
    $month_array = $this->getAllMonths();
    if(!empty($month_array)){
        foreach($month_array as  $month_no=> $month_name){
            $monthdata=  $this->data1($month_no);
            $dataz[$month_name]=$monthdata;

            // array_push($monthdatasum_array , $monthdata );
            // array_push($monthname_array ,$month_name);
        }
    }
    $users_array = array();
        $users =User::all()->where("name",'!=','Admin');

    foreach($users as $user){
        $id = $user->id;
        //This method is used to get a pure array
        array_push( $users_array,$user->name);
          
        }

$tank_data = Tank::all();
       
    
    return view('reports.reportD',compact('dataz','tank_data','users_array'));
}


public function downloadReport(){

    $dataz= array();
    $monthdata = array();
     $monthdatasum_array =  array();
     $monthname_array=  array();
     $month_array = $this->getAllMonths();
     if(!empty($month_array)){
         foreach($month_array as  $month_no=> $month_name){
             $monthdata=  $this->data1($month_no);
             $dataz[$month_name]=$monthdata;
 
             // array_push($monthdatasum_array , $monthdata );
             // array_push($monthname_array ,$month_name);
         }
     }
     $users_array = array();
         $users =User::all()->where("name",'!=','Admin');
 
     foreach($users as $user){
         $id = $user->id;
         //This method is used to get a pure array
         array_push( $users_array,$user->name);
           
         }
 
 $tank_data = Tank::all();

 $pdf = PDF::loadView('reports.report',['dataz'=>$dataz , 'tank_data'=>$tank_data,'users_array'=>$users_array])->setOptions(['defaultFont' => 'sans-serif']);;
 return $pdf->download('reportD.pdf');


}



public function data1($month){

    $data = (int)Session::get('tank_id');
    if($data == null){
        $data = 1;
    }
    
    $Monthly_data_sum=  DB::table('data')->where('tank_id',$data)->whereMonth('created_at', $month)->avg('used_volume');
return $Monthly_data_sum;
}



  


public function dataParser(Request $req){
    Session::put('tank_id', $req->input("tank_id"));
 
return redirect('/report');

}
//importnant functions
function getAllMonths(){
    $month_array = array();
    $data_dates = Data::orderBy('created_at' , 'ASC')->pluck('created_at');
$data_dates=  json_decode($data_dates);
if(!empty($data_dates)){
    foreach($data_dates as $dates){
        $date = new DateTime($dates);
     $month_name_label = $date->format('M');
     $month_no = $date->format('m');
     $month_array[$month_no] = $month_name_label;
   
    }
}

    return $month_array;
}
//get monthly count 
function getMonthlyDatasum($month){
$data = (int)Session::get('tank_id');
$Monthly_data_sum=  DB::table('data')->where('tank_id',$data)->whereMonth('created_at', $month)->avg('used_volume');
return $Monthly_data_sum;

}

function getMonthlyData(){
    $monthdatasum_array =  array();
    $monthname_array=  array();
    $month_array = $this->getAllMonths();
if(!empty($month_array)){
    foreach($month_array as  $month_no=> $month_name){
      $monthly_data_sum=   $this->getMonthlyDatasum($month_no);
      array_push($monthdatasum_array , $monthly_data_sum );
      array_push($monthname_array ,$month_name);

    }
}

$data_max = max($monthdatasum_array);
$max = round(($data_max+10/2)/10)*10;

$monthlyData_array = array(
'labels' => $monthname_array,
'sum' => $monthdatasum_array,
'max' => $max,
);
return $monthlyData_array;
}





function getAllWeeks(){
    $week_array = array();
    $data_dates = Data::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->orderBy('created_at' , 'ASC')->pluck('created_at');
$data_dates=  json_decode($data_dates);
if(!empty($data_dates)){
    foreach($data_dates as $dates){
        $date = new DateTime($dates);
     $day_name_label = $date->format('D');
     $day_no = $date->format('d');
    
     $week_array[$day_no] = $day_name_label;
  
   
    }
}
    return $week_array;
}
//Request $request
function getWeeklyDatasum($day,$month){
    $tank_id= (int)Session::get('tank_id');
    $weekly_data_sum= DB::table('data')->where('tank_id',$tank_id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->whereDay('created_at', $day)->
    whereMonth('created_at',$month)->avg('used_volume');
    return $weekly_data_sum;
    
    }
  
    
  public   function getWeeklyData(){
        $weekdatasum_array =  array();
        $weekname_array=  array();
        $week_array = $this->getAllWeeks();
$month = now();
$month_no= $month->format('m');
    if(!empty($week_array)){
       
            foreach($week_array as  $day_no=> $day_name_label ){
                $weekly_data_sum=   $this->getWeeklyDatasum( $day_no,$month_no);
                array_push($weekdatasum_array , $weekly_data_sum );
                array_push($weekname_array ,$day_name_label);
          
              
        }
       
    }
    

    $data_max = max($weekdatasum_array);
    $max = round(($data_max+10/2)/10)*10;
    
    $WeeklyData_array = array(
    'days' => $weekname_array,
    'sum_days' => $weekdatasum_array,
    'max' => $max,
    );
        // dd($request);
  
    return  $WeeklyData_array;
 
    }
    

   
  







    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
  
$week_array= array();
    $data  = Data::orderBy('created_at' , 'ASC')->pluck('created_at');
    $date_data = json_decode($data);
if(!empty($date_data)){
    foreach($date_data as $date){
        $date = new DateTime($date);
        $week = $date->format('D');
        $week_no = $date->format('d');
        $week_array[$week_no]= $week;
        return $week_array;
    }

}



        //  return view('dashboard', compact('data'));

    }

// public function dayVolume(){

  
//     $week_array= array();
//     $volume_array= array();
  
//     $data  = Data::orderBy('created_at' , 'ASC')->pluck('created_at');
//     $date_data = json_decode($data);
// if(!empty($date_data)){
//     foreach($date_data as $date){
//         $date = new DateTime($date);
//         $week = $date->format('H:i');
//         $week_d = $date->format('D');
// if($week == "00:00"){
//     $data_max =  Data::get()->where('created_at', '=', date('2022-04-04').' 00:00:00')->max('volume');
//     $data_min =  Data::get()->where('created_at', '=', date('2022-04-04').' 00:00:00')->min('volume');
//     $usage = $data_max -$data_min;
//     $volume_array[$week_d]= $usage;

// }        return $volume_array;

// }
// }}













    public function getWeekCount($month){
$week_count =  Data::whereDay('created_at', 6)->get()->count();

return $week_count;

    }

    public function week_data(){
        $week_count_array = array();
        $week_array = $this->index();
    if(!empty($week_array)){
foreach($week_array as $weeks=>$week){
$daily_count= $this->getWeekCount($week);
array_push($week_count_array , $daily_count);
}


    }
    return $week_count_array;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //   $response = Http::get('https://api.thingspeak.com/channels/1626829/feeds.json?api_key=A02S4WYULQYF2CLO');
    //     $data =  $response->json("feeds");
    //     $latest  = count($data)-1;
    //   $tank_id= $data[$latest]['field2'];
    //   $level= $data[$latest]['field1'];
    //     $latest = count($response["feeds"]);
        // $height = Tank::find($tank_id)->height;
        // $radius = Tank::find($tank_id)->radius; 
// $depth = $height-$level;
// $volume= 3.14*($radius*$radius)*$depth;
//    $data = new Data();
//    $data->tank_id = $tank_id;
//    $data->volume = $volume;
//    $response=$data->save();
$data = array();
$height =  DB::table('tank')->where('id',1)->value('height');
$radius =  DB::table('tank')->where('id',1)->value('radius');

 $data['height']= $height;
 $data['radius'] = $radius;


        return response()->json($data,200);
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
