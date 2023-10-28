<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class collect_data extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:collect_data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command when fired will collect the sensory data every thirty seconds of the level data  from the sensors and send them to the data base as volume';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://api.thingspeak.com/channels/1626829/feeds.json?api_key=A02S4WYULQYF2CLO');
        $data =  $response->json("feeds");
      
        $latest  = count($data)-1;
    //   $tank_id= $data[$latest]['field2'];
    $tank_id = 12;
      $level= $data[$latest]['field1'];
      $real_level = $level;
     
        $latest = count($response["feeds"]);
        $height =  DB::table('tank')->where('id',$tank_id)->value('height');
        $radius =  DB::table('tank')->where('id',$tank_id)->value('radius');
        $capacity =  DB::table('tank')->where('id',$tank_id)->value('capacity');
        // $height = Tank::find($tank_id)->height;
        // $radius = Tank::find($tank_id)->radius; 
$depth = $height-$real_level;
$re_volume= 3.14*($radius*$radius)*$depth;
$us_volume = $capacity - $re_volume;

$response = DB::table('data')->insert([
    'tank_id' => $tank_id,
    'remaining_volume' => $re_volume,
    'used_volume'=>$us_volume,
    'created_at'=>Carbon::now(),
    'Updated_at'=>Carbon::now(),
]);

//    $data = new Data();
//    $data->tank_id = $tank_id;
//    $data->volume = $volume;
//    $response=$data->save();
//    return response()->json($response,200);
   
    }
}
