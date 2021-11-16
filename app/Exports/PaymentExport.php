<?php

namespace App\Exports;

use App\Models\Payment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentExport implements FromView
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

    public function view(): View
    {
        return view('export.report_pay',[
            'data' => Payment::join('bookings','payments.booking_id','=','bookings.id')
            ->whereBetween('payment_date', [$this->awal, $this->akhir])
            ->orderBy('booking_date','asc')->get()
        ]);
    }
}
