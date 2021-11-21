<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class BookingChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $yearNow = Carbon::now('GMT+8')->format('Y');
        $yearLast = $yearNow-1;

        $LY = Carbon::createFromDate($yearLast, 01, 01, 'GMT+8');
        $TY = Carbon::createFromDate($yearNow, 12, 31, 'GMT+8');

        $jan = Booking::where('booking_status','return')
        ->whereMonth('booking_date',1)
        ->whereYear('booking_date',$yearNow)
        ->count();

        $feb = Booking::where('booking_status','return')
        ->whereMonth('booking_date',2)
        ->whereYear('booking_date',$yearNow)
        ->count();

        $mar = Booking::where('booking_status','return')
        ->whereMonth('booking_date',3)
        ->whereYear('booking_date',$yearNow)
        ->count();

        $apr = Booking::where('booking_status','return')
        ->whereMonth('booking_date',4)
        ->whereYear('booking_date',$yearNow)
        ->count();

        $may = Booking::where('booking_status','return')
        ->whereMonth('booking_date',5)
        ->whereYear('booking_date',$yearNow)
        ->count();

        $jun = Booking::where('booking_status','return')
        ->whereMonth('booking_date',6)
        ->whereYear('booking_date',$yearNow)
        ->count();

        $jul = Booking::where('booking_status','return')
        ->whereMonth('booking_date',7)
        ->whereYear('booking_date',$yearNow)
        ->count();

        $aug = Booking::where('booking_status','return')
        ->whereMonth('booking_date',8)
        ->whereYear('booking_date',$yearNow)
        ->count();

        $sep = Booking::where('booking_status','return')
        ->whereMonth('booking_date',9)
        ->whereYear('booking_date',$yearNow)
        ->count();

        $oct = Booking::where('booking_status','return')
        ->whereMonth('booking_date',10)
        ->whereYear('booking_date',$yearNow)
        ->count();

        $nov = Booking::where('booking_status','return')
        ->whereMonth('booking_date',11)
        ->whereYear('booking_date',$yearNow)
        ->count();

        $dec = Booking::where('booking_status','return')
        ->whereMonth('booking_date',12)
        ->whereYear('booking_date',$yearNow)
        ->count();
// ----------------------------------------------------------
        $janLY = Booking::where('booking_status','return')
        ->whereMonth('booking_date',1)
        ->whereYear('booking_date',$yearLast)
        ->count();

        $febLY = Booking::where('booking_status','return')
        ->whereMonth('booking_date',2)
        ->whereYear('booking_date',$yearLast)
        ->count();

        $marLY = Booking::where('booking_status','return')
        ->whereMonth('booking_date',3)
        ->whereYear('booking_date',$yearLast)
        ->count();

        $aprLY = Booking::where('booking_status','return')
        ->whereMonth('booking_date',4)
        ->whereYear('booking_date',$yearLast)
        ->count();

        $mayLY = Booking::where('booking_status','return')
        ->whereMonth('booking_date',5)
        ->whereYear('booking_date',$yearLast)
        ->count();

        $junLY = Booking::where('booking_status','return')
        ->whereMonth('booking_date',6)
        ->whereYear('booking_date',$yearLast)
        ->count();

        $julLY = Booking::where('booking_status','return')
        ->whereMonth('booking_date',7)
        ->whereYear('booking_date',$yearLast)
        ->count();

        $augLY = Booking::where('booking_status','return')
        ->whereMonth('booking_date',8)
        ->whereYear('booking_date',$yearLast)
        ->count();

        $sepLY = Booking::where('booking_status','return')
        ->whereMonth('booking_date',9)
        ->whereYear('booking_date',$yearLast)
        ->count();

        $octLY = Booking::where('booking_status','return')
        ->whereMonth('booking_date',10)
        ->whereYear('booking_date',$yearLast)
        ->count();

        $novLY = Booking::where('booking_status','return')
        ->whereMonth('booking_date',11)
        ->whereYear('booking_date',$yearLast)
        ->count();

        $decLY = Booking::where('booking_status','return')
        ->whereMonth('booking_date',12)
        ->whereYear('booking_date',$yearLast)
        ->count();

// ----------------------------------------------------------
        $janTotal = Booking::where('booking_status','return')
        ->whereMonth('booking_date',1)
        ->whereBetween('booking_date',[$LY,$TY])
        ->count();


        $febTotal = Booking::where('booking_status','return')
        ->whereMonth('booking_date',2)
        ->whereBetween('booking_date',[$LY,$TY])
        ->count();

        $marTotal = Booking::where('booking_status','return')
        ->whereMonth('booking_date',3)
        ->whereBetween('booking_date',[$LY,$TY])
        ->count();

        $aprTotal = Booking::where('booking_status','return')
        ->whereMonth('booking_date',4)
        ->whereBetween('booking_date',[$LY,$TY])
        ->count();

        $mayTotal = Booking::where('booking_status','return')
        ->whereMonth('booking_date',5)
        ->whereBetween('booking_date',[$LY,$TY])
        ->count();

        $junTotal = Booking::where('booking_status','return')
        ->whereMonth('booking_date',6)
        ->whereBetween('booking_date',[$LY,$TY])
        ->count();

        $julTotal = Booking::where('booking_status','return')
        ->whereMonth('booking_date',7)
        ->whereBetween('booking_date',[$LY,$TY])
        ->count();

        $augTotal = Booking::where('booking_status','return')
        ->whereMonth('booking_date',8)
        ->whereBetween('booking_date',[$LY,$TY])
        ->count();

        $sepTotal = Booking::where('booking_status','return')
        ->whereMonth('booking_date',9)
        ->whereBetween('booking_date',[$LY,$TY])
        ->count();

        $octTotal = Booking::where('booking_status','return')
        ->whereMonth('booking_date',10)
        ->whereBetween('booking_date',[$LY,$TY])
        ->count();

        $novTotal = Booking::where('booking_status','return')
        ->whereMonth('booking_date',11)
        ->whereBetween('booking_date',[$LY,$TY])
        ->count();

        $decTotal = Booking::where('booking_status','return')
        ->whereMonth('booking_date',12)
        ->whereBetween('booking_date',[$LY,$TY])
        ->count();

        return Chartisan::build()
        ->labels(['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'])
        ->dataset(''.$yearNow.'', [$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec])
        ->dataset(''.$yearLast.'', [$janLY, $febLY, $marLY, $aprLY, $mayLY, $junLY, $julLY, $augLY, $sepLY, $octLY, $novLY, $decLY])
        ->dataset('Total', [$janTotal, $febTotal, $marTotal, $aprTotal, $mayTotal, $junTotal, $julTotal, $augTotal, $sepTotal, $octTotal, $novTotal, $decTotal]);
    }
}