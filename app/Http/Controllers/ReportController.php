<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;
use App\Exports\BookingExport;
use App\Exports\PaymentExport;
use App\Exports\CarExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Carbon\Carbon;

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

        $nama = Booking::join('users','bookings.user_id','=','users.id')
        ->join('cars','bookings.car_id','=','cars.id')
        ->select('users.name','users.id')
        ->groupBy('users.name')
        ->get();
        return view('admin.report_book', compact('data','nama'));
    }

    public function payReport(){
        $data = Payment::join('bookings','payments.booking_id','=','bookings.id')
        ->get();
        return view('admin.report_pay', compact('data'));
    }

    public function bookReportSearch(Request $req){
        if ($req->nama == "") {
            $nama = Booking::join('users','bookings.user_id','=','users.id')
            ->join('cars','bookings.car_id','=','cars.id')
            ->select('users.name','users.id')
            ->groupBy('users.name')
            ->get();

            $awal = $req->awal;
            $akhir = $req->akhir;
            $data = Booking::join('users','bookings.user_id','=','users.id')
            ->join('cars','bookings.car_id','=','cars.id')
            ->whereBetween('booking_date', [$awal, $akhir])
            ->get();
            return view('admin.report_book_search', compact('data','awal','akhir','nama'));
        } elseif(($req->awal == "") && ($req->akhir == "")) {
            $nama = Booking::join('users','bookings.user_id','=','users.id')
            ->join('cars','bookings.car_id','=','cars.id')
            ->select('users.name','users.id')
            ->groupBy('users.name')
            ->get();

            $user = $req->nama;
            $data = Booking::join('users','bookings.user_id','=','users.id')
            ->join('cars','bookings.car_id','=','cars.id')
            ->where('users.id', $req->nama)
            ->get();
            return view('admin.report_book_search', compact('data','nama','user'));
        } elseif(($req->awal == "") && ($req->akhir == "") && ($req->nama == "")){
            alert()->warning('Pastikan form tidak kosong!');
            return redirect()->back();
        }else{
            $nama = Booking::join('users','bookings.user_id','=','users.id')
            ->join('cars','bookings.car_id','=','cars.id')
            ->select('users.name','users.id')
            ->groupBy('users.name')
            ->get();

            $awal = $req->awal;
            $akhir = $req->akhir;
            $data = Booking::join('users','bookings.user_id','=','users.id')
            ->join('cars','bookings.car_id','=','cars.id')
            ->whereBetween('booking_date', [$awal, $akhir])
            ->where('name', $req->nama)
            ->get();
            return view('admin.report_book_search', compact('data','awal','akhir','nama'));
        }
        
        
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

    public function bookPDF($awal = null, $akhir = null, $nama = null){
        $data = Booking::join('users','bookings.user_id','=','users.id')
        ->join('cars','bookings.car_id','=','cars.id')
        ->whereBetween('booking_date', [$awal, $akhir])
        ->get();

        $printDate = Carbon::now('GMT+8')->format('j F Y');

        $pdf = PDF::loadview('admin.book_pdf', compact('data','printDate'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('laporan-booking-'.$awal.'-'.$akhir.'-'.$nama.'.pdf');
    }
}
