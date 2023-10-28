<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Data;
use App\Models\Tank;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use App\Charts\TankChart;
use DateTime;
use PhpParser\Node\Expr\Cast\Double;

class ApiDataController extends Controller
{
    //Login to implement changing Tanks 
//(the monthly and weekly information and daily should be fetched according to particular tank.)
  //(NEED TO JOIN TABLES)
    public function  endevor($id){
      
       
        $bigbucket = 20;
        
        // $tank_data = DB::table('tank')
        // ->join('data', 'tank.id', '=', 'data.tank_id')
        // ->where('tank.user_id',$id)
        // ->select('data.*')
        // ->get();
     
        $bucketlist = array();
        $tank_perList = array();
$tank_capacity = array();
$used_volume =  array();
$company = array();
$remaining_volume = array(); 
        $tanks = DB::table('tank')
        ->join('data', 'tank.id', '=', 'data.tank_id')
        ->where('tank.user_id',$id)
       -> whereDay('data.created_at', '=', now())
        ->select('*')
        ->get();
      
       

       foreach($tanks as $tank){
        array_push($remaining_volume , $tank->remaining_volume);
        array_push($used_volume , $tank->used_volume);
        array_push($tank_capacity , $tank->capacity);
        array_push($company , $tank->company);


$bucketcalc= $tank->remaining_volume ;
$bucket = $bucketcalc/$bigbucket;
array_push($bucketlist,$bucket);
        $tankcapacity =  $tank->capacity;  
        $tank_per=$bucketcalc/$tankcapacity;
array_push($tank_perList,$tank_per);
       
       }
     
        // $bucket = $data /$bigbucket;
        // $tank_per =  ($data/$tankcapacity );
             
        $data_max = max($used_volume);
        $max = round(($data_max+10/2)/10)*10;
       
        $response = ['remaining_vol'=>$remaining_volume, 'data'=>$tank_perList,'buckets'=>$bucketlist, 'capacity'=>$tank_capacity, 'used_volume'=>$used_volume, 'company'=>$company,  'max'=>$max, 'message'=>true];

        return  response()->json($response,200);
        // return redirect('/dashboard'  ,compact('real_time'));

    }

    public function usedWaterDaily($id){
        $users = DB::table('tank')
            ->join('data', 'tank.id', '=', 'data.tank_id')
            ->where('tank.user_id',$id)
            ->select('*')
            ->get();
return $users;
    }





    public function usedWaterDailyList($id){
      
        $tank_id=$id;
       $big_bucket = 20;
       //$big_bucket = 1;

        $day_array = array();
        $time_array = array();
        $tanks =  DB::table('tank')->where('id', $tank_id)->get();
        foreach($tanks as $tank){
            $tankcapacity = $tank->capacity;
        }
       
        $datas =  DB::table('data')->where('tank_id', $tank_id)->whereDay('created_at',now())->get();
        foreach($datas as $data){
            $vol = $data->used_volume;
            $time = $data->created_at;
            array_push($day_array,$vol);
            array_push($time_array,$time);
        }
        
        $data_max = max($day_array);
        $max = round(($data_max+10/2)/10)*10;

        $tank_per= $vol/$tankcapacity;

        $buckets = round($vol/$big_bucket);
        
        $response = ['data'=>$day_array,'max'=>$max, 'tank_per'=> $tank_per,'buckets'=>$buckets, 'current_volume'=>$vol,'message'=>true];

        return  response()->json($response,200);
        // return redirect('/dashboard'  ,compact('real_time'));

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
function getMonthlyDatasum($id,$month){
$data = $id;
$Monthly_data_sum=  DB::table('data')->where('tank_id',$data)->whereMonth('created_at', $month)->sum('used_volume');
return $Monthly_data_sum;

}

function getMonthlyData($id){
    $monthdatasum_array =  array();
    $monthname_array=  array();
    $month_array = $this->getAllMonths();
if(!empty($month_array)){
    foreach($month_array as  $month_no=> $month_name){
      $monthly_data_sum=   $this->getMonthlyDatasum($id,$month_no);
      $datamore = $monthly_data_sum*0.1*10;
      array_push($monthdatasum_array , $datamore );
      array_push($monthname_array ,$month_name);
    //   $month = $month_name;
    //   $month_data = $monthly_data_sum;

    }
}

$data_max = max($monthdatasum_array);
$max = round(($data_max+10/2)/10)*10;

$monthlyData_array = array(
'labels' => $monthname_array,
'data' => $monthdatasum_array,
'max' => $max,
'message'=>true,
);
// return $monthlyData_array;

$response = $monthlyData_array;
return response()->json($response, 200);
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
function getWeeklyDatasum($id,$day,$month){
    $tank_id= $id;
    $weekly_data_sum= DB::table('data')->where('tank_id',$tank_id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->whereDay('created_at', $day)->
    whereMonth('created_at',$month)->sum('used_volume');
    return $weekly_data_sum;
    
    }
  
    ////
  public   function getWeeklyData($id){
    $weekdatasum_array = array();
    $weekname_array =  array();
        $week_array = $this->getAllWeeks();
$month = now();
$month_no= $month->format('m');
    if(!empty($week_array)){
       
            foreach($week_array as  $day_no=> $day_name_label ){
                $weekly_data_sum=   $this->getWeeklyDatasum($id, $day_no,$month_no);
                $datamore = $weekly_data_sum*0.1*10;
                array_push($weekdatasum_array , $datamore );
                array_push($weekname_array ,$day_name_label);
                // $weekdatasum = $weekly_data_sum;
                // $weekname = $day_name_label;
          
        }
       
    }
    
   
    $data_max = max($weekdatasum_array);
    $max = round(($data_max+10/2)/10)*10;
    
    $WeeklyData_array = array(
    'labels' => $weekname_array,
    'data' => $weekdatasum_array,
    'max' => $max,
    'message'=>true,
    );
        // dd($request);
  
    
        $response = $WeeklyData_array;
    
    return response()->json($response,200);
 
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
    // Your existing methods...
    
    public function sendDataToDataTables()
    {
        // Retrieve tanks from the tank table
        $tanks = DB::table('tank')->select('id', 'current_volume')->get();
        
        // Loop through each tank and insert data into the data table
        foreach ($tanks as $tank) {
            $data = [
                'tank_id' => $tank->id,
                'current_volume' => $tank->current_volume,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            
            DB::table('data')->insert($data);
        }
        
        return "Data sent to data table successfully!";
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
