<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Booking;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


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
            $dayNow = Carbon::now('GMT+8')->format('d');
            $monthNow = Carbon::now('GMT+8')->format('m');
            $yearNow = Carbon::now('GMT+8')->format('Y');
            $month = Carbon::now('GMT+8')->format('F');
            $yearLast = $yearNow-1;

            $incomeMonth = Payment::whereMonth('payment_date',$monthNow)->sum('total');
            $incomeDay = Payment::whereMonth('payment_date',$dayNow)->sum('total');
            $customer = User::where('access','user')->count();
            $bookedCar = Booking::whereMonth('booking_date',$monthNow)
            ->count();
            $returnedCar = Booking::whereMonth('booking_date',$monthNow)
            ->where('booking_status','return')
            ->count();
            $unpaid = Payment::where('payment_status','unpaid')
            ->sum('total');
            $fav = DB::table('bookings')
            ->join('cars','bookings.car_id','=','cars.id')
            ->select(DB::raw('count(cars.car_name) as car_count, car_name'))
            ->groupBy('car_name')
            ->orderBy('car_count','desc')
            ->pluck('cars.car_name');
            $favorite = $fav[0];
            $at = Car::where('transmition','AT')->count();
            $mt = Car::where('transmition','MT')->count();

            return view('admin.dashboard', compact('incomeMonth','incomeDay','customer','bookedCar','returnedCar','unpaid','month','favorite','at','mt','yearNow','yearLast'));
        }
    }

    public function calendar(){
        $calendar = Booking::join('users','bookings.user_id','=','users.id')
        ->join('cars','bookings.car_id','=','cars.id')
        ->get();
        return view('admin.calendar', compact('calendar'));
    }
}
