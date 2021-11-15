<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Booking;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $now = Carbon::now('GMT+8')->format('Y-m-d');
        if (Auth::user()->access == "user") {
            $data = Payment::join('bookings','payments.booking_id','=','bookings.id')
            ->where([ ['user_id', Auth::user()->id],['payment_status','unpaid'], ])
            ->orderBy('payments.id','desc')
            ->get();

            $count_booking = Booking::where('user_id',Auth::user()->id)->count();
            $count_next = Booking::where([ ['user_id',Auth::user()->id],['booking_date','>' ,$now], ])->count();

            $paid = Payment::join('bookings','payments.booking_id','=','bookings.id')
            ->where([ ['user_id', Auth::user()->id],['payment_status','paid'], ])
            ->orderBy('payments.id','desc')
            ->sum('total');

            $unpaid = Payment::join('bookings','payments.booking_id','=','bookings.id')
            ->where([ ['user_id', Auth::user()->id],['payment_status','unpaid'], ])
            ->orderBy('payments.id','desc')
            ->sum('total');

            return view('admin.dashboard', compact('data','count_booking','paid','unpaid','count_next'));
        } else {
            $calendar = Booking::all();
            return view('admin.dashboard', compact('calendar'));
        }
    }

    public function calendar(){
        $calendar = Booking::join('users','bookings.user_id','=','users.id')
        ->join('cars','bookings.car_id','=','cars.id')
        ->get();
        return view('admin.calendar', compact('calendar'));
    }
}
