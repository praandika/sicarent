<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Car::insert([
            [
                'car_name' => 'Agya',
                'car_brand' => 'Toyota',
                'transmition' => 'AT',
                'car_type' => 'Hatchback Car',
                'engine_vol' => '1200',
                'price' => 200000,
                'plate_number' => 'DK 1234 ABC',
                'car_capacity' => '5',
                'car_year' => '2017',
                'image' => 'agya.png',
                'fuel' => 'Bensin',
                'car_status' => 'Available',
                'kilometers' => 2000,
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
            [
                'car_name' => 'Terios',
                'car_brand' => 'Daihatsu',
                'transmition' => 'MT',
                'car_type' => 'SUV',
                'engine_vol' => '1500',
                'price' => 280000,
                'plate_number' => 'DK 1762 ABC',
                'car_capacity' => '7',
                'car_year' => '2019',
                'image' => 'terios.jpg',
                'fuel' => 'Bensin',
                'car_status' => 'Available',
                'kilometers' => 3419,
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
            [
                'car_name' => 'Brio',
                'car_brand' => 'Honda',
                'transmition' => 'AT',
                'car_type' => 'Hatchback Car',
                'engine_vol' => '1199',
                'price' => 200000,
                'plate_number' => 'DK 3983 KJH',
                'car_capacity' => '5',
                'car_year' => '2020',
                'image' => 'brio.png',
                'fuel' => 'Bensin',
                'car_status' => 'Rented',
                'kilometers' => 8723,
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
            [
                'car_name' => 'Pajero',
                'car_brand' => 'Mitsubishi',
                'transmition' => 'MT',
                'car_type' => 'SUV',
                'engine_vol' => '2442',
                'price' => 350000,
                'plate_number' => 'DK 7482 JAG',
                'car_capacity' => '7',
                'car_year' => '2020',
                'image' => 'pajero.png',
                'fuel' => 'Bensin',
                'car_status' => 'Rented',
                'kilometers' => 10862,
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
