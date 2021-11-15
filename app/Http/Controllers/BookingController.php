<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $calendar = Booking::where('car_id',$id)
        ->get();
        $month = Carbon::now('GMT+8')->format('M');
        
        // // Hitung harga
        // $start = Carbon::parse($bookDate)->format('Ymd');
        // $end = Carbon::parse($returnDate)->format('Ymd');
        // $days = $end - $start;
        // $total = $singePrice*$days;

        return view('detail', compact('data','id','month','calendar'));
    }

    public function savebook(Request $req){
        $now = Carbon::now('GMT+8')->format('YmdHis');
        $bookCode = 'PBCR'.$now;
        // Cek booking date
        $start = Booking::where([
            ['car_id',$req->id],
            ['booking_date',$req->start],
        ])->count();
        $end = Booking::where([
            ['car_id',$req->id],
            ['return_date',$req->end],
        ])->count();

        if ($start > 0) {
            alert()->warning('Warning','Booking date is full, please choose another date');
            return redirect()->back()->withInput();
        } elseif($start == 0 ) {
            if ($end > 0) {
                alert()->warning('Warning','Booking date is full, please choose another date');
                return redirect()->back()->withInput();
            } else {
                $book = new Booking;
                $book->book_code = $bookCode;
                $book->user_id = Auth::user()->id;
                $book->car_id = $req->id;
                $book->booking_date = $req->start;
                $book->return_date = $req->end;
                $book->save();

                toast('Data berhasil disimpan','success')->autoClose(1500);
                return redirect()->route('confirm');
            }
        }
    }

    public function setbook(Request $req){
        $data = Car::where('id',$req->id)->get();
        return view('setbook', compact('data'));
    }
}
