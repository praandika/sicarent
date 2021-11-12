<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Booking::insert([
            [
                'user_id' => 1,
                'car_id' => 1,
                'book_code' => 'PBCR20210113105001',
                'booking_date' => '2021-10-25',
                'return_date' => '2021-10-26',
                'booking_status' => 'paid',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 2,
                'car_id' => 1,
                'book_code' => 'PBCR20210213105001',
                'booking_date' => '2021-10-26',
                'return_date' => '2021-10-28',
                'booking_status' => 'paid',
                'created_at' => '2021-10-26 14:09:12'
            ],
            [
                'user_id' => 3,
                'car_id' => 4,
                'book_code' => 'PBCR20210313105001',
                'booking_date' => '2021-10-27',
                'return_date' => '2021-10-28',
                'booking_status' => 'paid',
                'created_at' => '2021-10-27 08:40:31'
            ],
            [
                'user_id' => 4,
                'car_id' => 2,
                'book_code' => 'PBCR20210413105001',
                'booking_date' => '2021-10-27',
                'return_date' => '2021-10-28',
                'booking_status' => 'unpaid',
                'created_at' => '2021-10-27 09:12:12'
            ],
        ]);
    }
}
