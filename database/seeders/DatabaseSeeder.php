<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        $this->call(CarTableSeeder::class);
        $this->call(PaymentTableSeeder::class);
        $this->call(BookingTableSeeder::class);
        \App\Models\User::insert([
            [
                'name' => 'Andika Pranayoga',
                'username' => 'andika',
                'email' => 'praandikayoga@gmail.com',
                'email_verified_at' => Carbon::now('GMT+8'),
                'password' => bcrypt('12345678'),
                'access' => 'admin',
            ],
            [
                'name' => 'Pemimpin',
                'username' => 'arya',
                'email' => 'aryasuparta@gmail.com',
                'email_verified_at' => Carbon::now('GMT+8'),
                'password' => bcrypt('12345678'),
                'access' => 'head',
            ],
            
        ]);
    }
}
