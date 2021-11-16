<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function awal(string $awal)
    {
        $this->awal = $awal;
        
        return $this;
    }

    public function akhir(string $akhir)
    {
        $this->akhir = $akhir;
        
        return $this;
    }

    public function query()
    {
        return Booking::query()
        ->join('users','bookings.user_id','=','users.id')
        ->join('cars','bookings.car_id','=','cars.id')
        ->select('book_code', 'users.name', 'users.phone', 'users.address', 'cars.car_name', 'booking_date', 'return_date', 'booking_status')
        ->whereBetween('booking_date', [$this->awal, $this->akhir])
        ->orderBy('booking_date','asc');
    }

    public function headings(): array
    {
        return [
            'Invoice',
            'Name',
            'Phone',
            'Address',
            'Mobil',
            'Booking Date',
            'Return Date',
            'Status',
        ];
    }
}
