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
                'booking_date' => '2021-01-25',
                'return_date' => '2021-01-26',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 1,
                'car_id' => 2,
                'book_code' => 'PBCR20210114105001',
                'booking_date' => '2021-01-27',
                'return_date' => '2021-01-28',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 2,
                'car_id' => 2,
                'book_code' => 'PBCR20210214105001',
                'booking_date' => '2021-02-27',
                'return_date' => '2021-02-28',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 3,
                'car_id' => 3,
                'book_code' => 'PBCR20210314105001',
                'booking_date' => '2021-03-27',
                'return_date' => '2021-03-28',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 3,
                'car_id' => 4,
                'book_code' => 'PBCR20210315105001',
                'booking_date' => '2021-03-20',
                'return_date' => '2021-03-22',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 5,
                'car_id' => 1,
                'book_code' => 'PBCR20210415105001',
                'booking_date' => '2021-04-20',
                'return_date' => '2021-04-22',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 5,
                'car_id' => 3,
                'book_code' => 'PBCR20210515105001',
                'booking_date' => '2021-05-20',
                'return_date' => '2021-05-22',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 1,
                'car_id' => 3,
                'book_code' => 'PBCR20210615105001',
                'booking_date' => '2021-06-20',
                'return_date' => '2021-06-22',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 8,
                'car_id' => 3,
                'book_code' => 'PBCR20210715105001',
                'booking_date' => '2021-07-20',
                'return_date' => '2021-07-22',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 6,
                'car_id' => 3,
                'book_code' => 'PBCR20210716105001',
                'booking_date' => '2021-07-19',
                'return_date' => '2021-07-21',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 6,
                'car_id' => 2,
                'book_code' => 'PBCR20210816105001',
                'booking_date' => '2021-08-19',
                'return_date' => '2021-08-21',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 3,
                'car_id' => 1,
                'book_code' => 'PBCR20210916105001',
                'booking_date' => '2021-09-19',
                'return_date' => '2021-09-21',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 6,
                'car_id' => 2,
                'book_code' => 'PBCR20211016105001',
                'booking_date' => '2021-10-19',
                'return_date' => '2021-10-21',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 6,
                'car_id' => 2,
                'book_code' => 'PBCR20211116105001',
                'booking_date' => '2021-11-19',
                'return_date' => '2021-11-21',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            
            [
                'user_id' => 3,
                'car_id' => 3,
                'book_code' => 'PBCR20201216105001',
                'booking_date' => '2020-12-19',
                'return_date' => '2020-12-21',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            
            [
                'user_id' => 1,
                'car_id' => 3,
                'book_code' => 'PBCR20201218105001',
                'booking_date' => '2020-12-28',
                'return_date' => '2020-12-29',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 5,
                'car_id' => 2,
                'book_code' => 'PBCR20201219105001',
                'booking_date' => '2020-12-01',
                'return_date' => '2020-12-02',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 5,
                'car_id' => 2,
                'book_code' => 'PBCR20210820105001',
                'booking_date' => '2021-08-01',
                'return_date' => '2021-08-02',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],

            [
                'user_id' => 1,
                'car_id' => 1,
                'book_code' => 'PBCR20200113105001',
                'booking_date' => '2020-01-25',
                'return_date' => '2020-01-26',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 1,
                'car_id' => 2,
                'book_code' => 'PBCR20200114105001',
                'booking_date' => '2020-01-27',
                'return_date' => '2020-01-28',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],

            [
                'user_id' => 2,
                'car_id' => 2,
                'book_code' => 'PBCR20200214105001',
                'booking_date' => '2020-02-27',
                'return_date' => '2020-02-28',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 2,
                'car_id' => 3,
                'book_code' => 'PBCR20200215105001',
                'booking_date' => '2020-02-20',
                'return_date' => '2020-02-22',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 3,
                'car_id' => 3,
                'book_code' => 'PBCR20200216105001',
                'booking_date' => '2020-02-01',
                'return_date' => '2020-02-02',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 3,
                'car_id' => 1,
                'book_code' => 'PBCR20200316105001',
                'booking_date' => '2020-03-01',
                'return_date' => '2020-03-02',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 4,
                'car_id' => 1,
                'book_code' => 'PBCR20200416105001',
                'booking_date' => '2020-04-01',
                'return_date' => '2020-04-02',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 4,
                'car_id' => 2,
                'book_code' => 'PBCR20200516105001',
                'booking_date' => '2020-05-01',
                'return_date' => '2020-05-02',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 1,
                'car_id' => 2,
                'book_code' => 'PBCR20200616105001',
                'booking_date' => '2020-06-01',
                'return_date' => '2020-06-02',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 7,
                'car_id' => 2,
                'book_code' => 'PBCR20200716105001',
                'booking_date' => '2020-07-01',
                'return_date' => '2020-07-02',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 8,
                'car_id' => 2,
                'book_code' => 'PBCR20200816105001',
                'booking_date' => '2020-08-01',
                'return_date' => '2020-08-02',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 9,
                'car_id' => 2,
                'book_code' => 'PBCR20200916105001',
                'booking_date' => '2020-09-01',
                'return_date' => '2020-09-02',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 9,
                'car_id' => 2,
                'book_code' => 'PBCR20200918105001',
                'booking_date' => '2020-09-18',
                'return_date' => '2020-09-19',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 5,
                'car_id' => 1,
                'book_code' => 'PBCR20201018105001',
                'booking_date' => '2020-10-18',
                'return_date' => '2020-10-19',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 5,
                'car_id' => 2,
                'book_code' => 'PBCR20201118105001',
                'booking_date' => '2020-11-18',
                'return_date' => '2020-11-19',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
            [
                'user_id' => 4,
                'car_id' => 3,
                'book_code' => 'PBCR20201120105001',
                'booking_date' => '2020-11-20',
                'return_date' => '2020-11-21',
                'booking_status' => 'return',
                'created_at' => '2021-10-25 10:50:01'
            ],
        ]);
    }
}
