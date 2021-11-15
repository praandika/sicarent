<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        if (Auth::user()->access == "user") {
            $data = Booking::join('users','booking.user_id','=','users.id')
            ->join('cars','booking_car_id','=','cars.id')
            ->get();
            return view('admin.dashboard', compact('data'));
        } else {
            return view('admin.dashboard');
        }
    }
}
