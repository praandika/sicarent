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
        ->select(DB::raw('count(description) as damage_count, damages.id, cars.car_name, cars.kilometers, damages.category', 'cars.transmition', 'damages.status'))
        ->where('damages.status','damaged')
        ->groupBy('cars.car_name')
        ->orderBy('cars.car_name','desc')
        ->get();

        return view('admin.damage', compact('data'));
    }

    public function show($id){
        $data = Damage::join('cars','damages.car_id','=','cars.id')
        ->where('damages.id',$id)
        ->get();

        return view('admin.damage-show', compact('data'));
    }

    public function create(){
        $data = Car::orderBy('car_name', 'asc')->get();
        return view('admin.create.damage-create', compact('data'));
    }

    public function store(Request $req){
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

    public function edit($id){
        $data = Damage::join('cars','damages.car_id','=','cars.id')
        ->where('damages.id',$id)
        ->get();

        return view('admin.damage_edit', compact('data'));
    }

    public function update(Request $req){
        $data = Damage::find($req->id);
        $data->status = "fixed";
        $data->save();

        return redirect()->back();
    }
}
