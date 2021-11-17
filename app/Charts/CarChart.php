<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use DB;

class CarChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $fav = DB::table('bookings')
            ->join('cars','bookings.car_id','=','cars.id')
            ->select(DB::raw('count(car_name) as car_count, car_name'))
            ->groupBy('car_name')
            ->orderBy('car_count','desc')
            ->pluck('cars.car_name');
       

        $count = DB::table('bookings')
            ->join('cars','bookings.car_id','=','cars.id')
            ->select(DB::raw('count(cars.car_name) as car_count, cars.car_name'))
            ->groupBy('cars.car_name')
            ->orderBy('car_count','desc')
            ->pluck('car_count');

        return Chartisan::build()
            ->labels(array($fav))
            ->dataset('Favorite Car', [$count]);
    }
}