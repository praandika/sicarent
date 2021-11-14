<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function booking(Request $req){
        // Get form value dari home page
        $bookDate = $req->bookdate;
        $returnDate = $req->returndate;
        $capacity = $req->capacity;
        $transmition = $req->transmition;
        $token = $req->_token;

        $data = Car::where([
                ['transmition', $transmition],
                ['car_capacity', $capacity],
            ]
        )->get();
        
        return view('search', compact('bookDate','returnDate','capacity','transmition','data','token'));
    }

    public function detail($token, $id, $singePrice){
        // Get Car data
        $data = Car::where('id',$id)->get();
        $month = Carbon::now('GMT+8')->format('M');
        
        // // Hitung harga
        // $start = Carbon::parse($bookDate)->format('Ymd');
        // $end = Carbon::parse($returnDate)->format('Ymd');
        // $days = $end - $start;
        // $total = $singePrice*$days;

        return view('detail', compact('data','id','month'));
    }

    public function setbook(Request $req){
        $data = Car::where('id',$req->id)->get();
        return view('setbook', compact('data'));
    }
}
