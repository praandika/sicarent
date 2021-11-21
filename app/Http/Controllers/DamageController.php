<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Damage;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class DamageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = Damage::join('cars','damages.car_id','=','cars.id')
        ->select(DB::raw('count(description) as damage_count, damages.id, cars.car_name, cars.kilometers, damages.category, cars.transmition, damages.status, cars.id as car_id'))
        ->where('damages.status','damaged')
        ->groupBy('cars.car_name')
        ->orderBy('cars.car_name','desc')
        ->get();

        return view('admin.damage', compact('data'));
    }

    public function show($carId){
        $car = Car::find($carId);

        $data = Damage::join('cars','damages.car_id','=','cars.id')
        ->where([
                ['cars.id',$carId],
                ['damages.status','damaged']
            ])
        ->get();

        return view('admin.damage-show', compact('data','car'));
    }

    public function create(){
        $data = Car::orderBy('car_name', 'asc')->get();
        return view('admin.create.damage-create', compact('data'));
    }

    public function store(Request $req){
        if (($req->plate == "") || ($req->car_name == "") || ($req->transmition == "") || ($req->tahun == "")) {
            alert()->warning('Warning','Field input tidak boleh kosong!');
            return redirect()->back();
        } else {
            $car_id = $req->car_id;
        for ($i=0; $i < count($req->category); $i++) { 
            Damage::create([
                'car_id' => $car_id,
                'category' => $req->category[$i],
                'description' => $req->description[$i],
            ]);
        }
        toast('Data berhasil disimpan','success')->autoClose(1500);
        return redirect()->route('damage.read');
        }
    }

    public function edit($carId){
        $car = Car::find($carId);

        $data = Damage::join('cars','damages.car_id','=','cars.id')
        ->where([
            ['cars.id',$carId],
            ['damages.status','damaged']
        ])
        ->select('damages.id' ,'category', 'description', 'damages.created_at')
        ->get();

        return view('admin.edit.damage-edit', compact('data','car'));
    }

    public function update($id){
        $data = Damage::find($id);
        $data->status = "fixed";
        $data->save();

        toast('Kerusakan berhasil diperbaiki','success')->autoClose(1500);
        return redirect()->back();
    }
}
