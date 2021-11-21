<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;
use App\Exports\BookingExport;
use App\Exports\PaymentExport;
use App\Exports\CarExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        return view('admin.report');
    }

    public function bookReport(){
        $data = Booking::join('users','bookings.user_id','=','users.id')
        ->join('cars','bookings.car_id','=','cars.id')
        ->get();
        return view('admin.report_book', compact('data'));
    }

    public function payReport(){
        $data = Payment::join('bookings','payments.booking_id','=','bookings.id')
        ->get();
        return view('admin.report_pay', compact('data'));
    }

    public function bookReportSearch(Request $req){
        $awal = $req->awal;
        $akhir = $req->akhir;
        $data = Booking::join('users','bookings.user_id','=','users.id')
        ->join('cars','bookings.car_id','=','cars.id')
        ->whereBetween('booking_date', [$awal, $akhir])
        ->get();
        return view('admin.report_book_search', compact('data','awal','akhir'));
    }

    public function payReportSearch(Request $req){
        $awal = $req->awal;
        $akhir = $req->akhir;
        $data = Payment::join('bookings','payments.booking_id','=','bookings.id')
        ->whereBetween('payment_date', [$awal, $akhir])
        ->get();
        return view('admin.report_pay_search', compact('data','awal','akhir'));
    }

    public function exportBook($awal, $akhir){
        return (new BookingExport)->awal($awal)->akhir($akhir)->download('Booking_report_'.$awal.'-'.$akhir.'.xlsx');
    }

    public function exportPay($awal, $akhir){
        return (new PaymentExport)->awal($awal)->akhir($akhir)->download('Payment_report_'.$awal.'-'.$akhir.'.xlsx');
    }

    public function exportCar(){
        return Excel::download(new CarExport, 'car-report.xlsx');
    }
}
