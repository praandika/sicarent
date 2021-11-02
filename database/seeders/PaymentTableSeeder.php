<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Payment::insert([
            [
                'booking_id' => 1,
                'payment_date' => '2021-10-25',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-10-25 10:57:01'
            ],
            [
                'booking_id' => 2,
                'payment_date' => '2021-10-26',
                'fines' => 15000,
                'total' => 215000,
                'changes' => 0,
                'overtime' => 1,
                'created_at' => '2021-10-26 14:13:45'
            ],
            [
                'booking_id' => 3,
                'payment_date' => '2021-10-27',
                'fines' => 0,
                'total' => 350000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-10-27 08:45:23'
            ],
        ]);
    }
}
