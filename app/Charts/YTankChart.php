<?php

declare(strict_types = 1);
namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

/*class YTankChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     
    public function __construct()
    {
        parent::__construct();
    }
}*/


class YTankChart extends BaseChart
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
            ->dataset('Monthly Chart', [1, 2, 3]);
           
    }
}