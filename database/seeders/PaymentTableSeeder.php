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
                'invoice' => 'PBCR20210113105001',
                'payment_date' => '2021-01-25',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 2,
                'invoice' => 'PBCR20210114105001',
                'payment_date' => '2021-01-27',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 3,
                'invoice' => 'PBCR20210214105001',
                'payment_date' => '2021-02-27',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 4,
                'invoice' => 'PBCR20210314105001',
                'payment_date' => '2021-03-27',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 5,
                'invoice' => 'PBCR20210315105001',
                'payment_date' => '2021-03-20',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 6,
                'invoice' => 'PBCR20210415105001',
                'payment_date' => '2021-04-20',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 7,
                'invoice' => 'PBCR20210515105001',
                'payment_date' => '2021-05-20',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 8,
                'invoice' => 'PBCR20210615105001',
                'payment_date' => '2021-06-20',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 9,
                'invoice' => 'PBCR20210715105001',
                'payment_date' => '2021-07-20',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 10,
                'invoice' => 'PBCR20210716105001',
                'payment_date' => '2021-07-19',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 11,
                'invoice' => 'PBCR20210816105001',
                'payment_date' => '2021-08-19',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 12,
                'invoice' => 'PBCR20210916105001',
                'payment_date' => '2021-09-19',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 13,
                'invoice' => 'PBCR20211016105001',
                'payment_date' => '2021-10-19',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 14,
                'invoice' => 'PBCR20211116105001',
                'payment_date' => '2021-11-19',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            
            [
                'booking_id' => 15,
                'invoice' => 'PBCR20201216105001',
                'payment_date' => '2020-12-19',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            
            [
                'booking_id' => 16,
                'invoice' => 'PBCR20201218105001',
                'payment_date' => '2020-12-28',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 17,
                'invoice' => 'PBCR20201219105001',
                'payment_date' => '2020-12-01',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 18,
                'invoice' => 'PBCR20210820105001',
                'payment_date' => '2021-08-01',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],

            [
                'booking_id' => 19,
                'invoice' => 'PBCR20200113105001',
                'payment_date' => '2020-01-25',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 20,
                'invoice' => 'PBCR20200114105001',
                'payment_date' => '2020-01-27',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 21,
                'invoice' => 'PBCR20200214105001',
                'payment_date' => '2020-02-27',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 22,
                'invoice' => 'PBCR20200215105001',
                'payment_date' => '2020-02-20',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 23,
                'invoice' => 'PBCR20200216105001',
                'payment_date' => '2020-02-01',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 24,
                'invoice' => 'PBCR20200316105001',
                'payment_date' => '2020-03-01',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 25,
                'invoice' => 'PBCR20200416105001',
                'payment_date' => '2020-04-01',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 26,
                'invoice' => 'PBCR20200516105001',
                'payment_date' => '2020-05-01',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 27,
                'invoice' => 'PBCR20200616105001',
                'payment_date' => '2020-06-01',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 28,
                'invoice' => 'PBCR20200716105001',
                'payment_date' => '2020-07-01',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 29,
                'invoice' => 'PBCR20200816105001',
                'payment_date' => '2020-08-01',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 30,
                'invoice' => 'PBCR20200916105001',
                'payment_date' => '2020-09-01',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 31,
                'invoice' => 'PBCR20200918105001',
                'payment_date' => '2020-09-18',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 32,
                'invoice' => 'PBCR20201018105001',
                'payment_date' => '2020-10-18',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 33,
                'invoice' => 'PBCR20201118105001',
                'payment_date' => '2020-11-18',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
            [
                'booking_id' => 34,
                'invoice' => 'PBCR20201120105001',
                'payment_date' => '2020-11-20',
                'fines' => 0,
                'total' => 200000,
                'changes' => 0,
                'overtime' => 0,
                'created_at' => '2021-11-25 10:57:01'
            ],
        ]);
    }
}
