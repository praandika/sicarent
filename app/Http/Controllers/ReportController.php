<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;
use App\Models\User;
use App\Models\Car;
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

        $nama = Payment::join('bookings','payments.booking_id','=','bookings.id')
        ->groupBy('bookings.user_id')
        ->get();
        return view('admin.report_pay', compact('data','nama'));
    }

    public function bookReportSearch(Request $req){
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
    }

    public function bookReportSearchName(Request $req){
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
        return view('admin.report_book_search_name', compact('data','user','nama'));
    }

    public function payReportSearch(Request $req){
        $nama = Payment::join('bookings','payments.booking_id','=','bookings.id')
        ->groupBy('bookings.user_id')
        ->get();

        $awal = $req->awal;
        $akhir = $req->akhir;
        $data = Payment::join('bookings','payments.booking_id','=','bookings.id')
        ->whereBetween('payment_date', [$awal, $akhir])
        ->get();
        return view('admin.report_pay_search', compact('data','awal','akhir','nama'));
    }

    public function payReportSearchName(Request $req){
        $nama = Payment::join('bookings','payments.booking_id','=','bookings.id')
        ->groupBy('bookings.user_id')
        ->get();

        $user = $req->nama;

        $data = Payment::join('bookings','payments.booking_id','=','bookings.id')
        ->where('bookings.user_id', $req->nama)
        ->get();
        return view('admin.report_pay_search_name', compact('data','user','nama'));
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

    public function bookPDF($awal, $akhir){
        $data = Booking::join('users','bookings.user_id','=','users.id')
        ->join('cars','bookings.car_id','=','cars.id')
        ->whereBetween('booking_date', [$awal, $akhir])
        ->get();

        $printDate = Carbon::now('GMT+8')->format('j F Y');

        $pdf = PDF::loadview('admin.book_pdf', compact('data','printDate','awal','akhir'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('laporan-booking-'.$awal.'-'.$akhir.'.pdf');
    }

    public function bookNamePDF($user){
        $data = Booking::join('users','bookings.user_id','=','users.id')
        ->join('cars','bookings.car_id','=','cars.id')
        ->where('users.id', $user)
        ->get();

        $nameArr = User::where('id',$user)->pluck('name');
        $name = $nameArr[0];

        $printDate = Carbon::now('GMT+8')->format('j F Y');

        $pdf = PDF::loadview('admin.book_name_pdf', compact('data','printDate','name'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('laporan-booking-'.$user.'.pdf');
    }

    public function payPDF($awal, $akhir){
        $data = Payment::join('bookings','payments.booking_id','=','bookings.id')
        ->whereBetween('payment_date', [$awal, $akhir])
        ->get();

        $total = 0;

        foreach ($data as $o) {
            $total += $o->total;
        }

        $printDate = Carbon::now('GMT+8')->format('j F Y');

        $pdf = PDF::loadview('admin.pay_pdf', compact('data','printDate','awal','akhir','total'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('laporan-payment-'.$awal.'-'.$akhir.'.pdf');
    }

    public function payNamePDF($user){
        $data = Payment::join('bookings','payments.booking_id','=','bookings.id')
        ->where('bookings.user_id', $user)
        ->get();

        $total = 0;

        foreach ($data as $o) {
            $total += $o->total;
        }

        $nameArr = User::where('id',$user)->pluck('name');
        $name = $nameArr[0];

        $printDate = Carbon::now('GMT+8')->format('j F Y');

        $pdf = PDF::loadview('admin.pay_name_pdf', compact('data','printDate','name','total'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('laporan-payment-'.$user.'.pdf');
    }

    public function carPDF(){
        $data = Car::all();

        $printDate = Carbon::now('GMT+8')->format('j F Y');

        $pdf = PDF::loadview('admin.car_pdf', compact('data','printDate'))->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a4', 'landscape');
        return $pdf->stream('laporan-car.pdf');
    }
}
