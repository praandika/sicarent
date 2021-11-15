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

    public function look($id){
        $data = Car::where('id',$id)->get();
        $car = Car::all();
        return view('look', compact('data','car'));
    }

    public function carList(){
        $data = Car::all();
        return view('carlist', compact('data'));
    }
}
