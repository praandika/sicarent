<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $data = Car::orderBy('id','desc')->get();
        return view('admin.car', compact('data'));
    }

    public function create(){
        return view('admin.create.car-create');
    }

    public function store(Request $req){
        $img = $req->file('image');
        $img_file = time()."_".$img->getClientOriginalName();
        $dir_img = 'images/car';
        $img->move($dir_img,$img_file);
        
        $car = new Car;
        $car->car_name = $req->car_name;
        $car->car_brand = $req->car_brand;
        $car->transmition = $req->transmition;
        $car->car_type = $req->car_type;
        $car->engine_vol = $req->engine_vol;
        $car->price = $req->price;
        $car->plate_number = $req->plate_number;
        $car->car_capacity = $req->car_capacity;
        $car->car_year = $req->car_year;
        $car->image = $img_file;
        $car->fuel = $req->fuel;
        $car->save();
        toast('Data berhasil disimpan','success')->autoClose(1500);
        return redirect()->route('car.read');
    }

    public function edit($id){
        $data = Car::where('id',$id)->get();
        return view('admin.edit.car-edit', compact('data'));
    }

    public function update(Request $req){
        if ($req->hasfile('image')) {
            $img_prev = $req->img_prev;
            unlink("images/car/".$img_prev);
            $img = $req->file('image');
            $img_file = time()."_".$img->getClientOriginalName();
            $dir_img = 'images/car';
            $img->move($dir_img,$img_file);

            $car = Car::find($req->id);
            $car->car_name = $req->car_name;
            $car->car_brand = $req->car_brand;
            $car->transmition = $req->transmition;
            $car->car_type = $req->car_type;
            $car->engine_vol = $req->engine_vol;
            $car->price = $req->price;
            $car->plate_number = $req->plate_number;
            $car->car_capacity = $req->car_capacity;
            $car->car_year = $req->car_year;
            $car->image = $img_file;
            $car->fuel = $req->fuel;
            $car->save();
            toast('Data berhasil diubah','success')->autoClose(1500);
            return redirect()->route('car.read');
        }else{
            $car = Car::find($req->id);
            $car->car_name = $req->car_name;
            $car->car_brand = $req->car_brand;
            $car->transmition = $req->transmition;
            $car->car_type = $req->car_type;
            $car->engine_vol = $req->engine_vol;
            $car->price = $req->price;
            $car->plate_number = $req->plate_number;
            $car->car_capacity = $req->car_capacity;
            $car->car_year = $req->car_year;
            $car->fuel = $req->fuel;
            $car->save();
            toast('Data berhasil diubah','success')->autoClose(1500);
            return redirect()->route('car.read');
        }
    }

    public function delete(Request $req){
        $delid = $req->input('pilih');
        Car::whereIn('id',$delid)->delete();
        toast('Data berhasil dihapus','success')->autoClose(1500);
        return redirect()->route('car.read');
    }
}
