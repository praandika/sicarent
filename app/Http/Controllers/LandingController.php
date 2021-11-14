<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class LandingController extends Controller
{
    public function index(){
        $data = Car::groupBy('car_capacity')->get('car_capacity');
        $car = Car::all();
        return view('landing', compact('data','car'));
    }

    public function car(){
        // 
    }
}
