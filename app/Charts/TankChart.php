<?php

namespace App\Charts;

declare(strict_types = 1);

use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/*class TankChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    //public function __construct()
    /*{
        parent::__construct();
    }*/
    
class TankChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(['First', 'Second', 'Third'])
            ->dataset('Weekly Chart', [1, 2, 1,5,12,2]);
           
    }
}