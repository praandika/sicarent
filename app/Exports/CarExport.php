<?php

namespace App\Exports;

use App\Models\Car;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CarExport implements FromQuery, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Car::query()
        ->select('car_brand', 'car_name', 'car_type', 'transmition', 'engine_vol', 'price', 'plate_number', 'car_year','kilometers','fuel');
    }

    public function headings(): array
    {
        return [
            'Brand',
            'Car Name',
            'Car Type',
            'Transmition',
            'Engine Vol',
            'Price',
            'Plate Number',
            'Car Year',
            'Kilometers',
            'Fuel'
        ];
    }
}
