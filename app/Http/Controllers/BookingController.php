<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use App\Models\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function booking(Request $req){
        // Get form value dari home page
        $bookDate = $req->bookdate;
        $returnDate = $req->returndate;
        $capacity = $req->capacity;
        $transmition = $req->transmition;
        $token = $req->_token;

        $data = Car::where([
                ['transmition', $transmition],
                ['car_capacity', $capacity],
            ]
        )->get();
        
        return view('search', compact('bookDate','returnDate','capacity','transmition','data','token'));
    }

    public function detail($token, $id, $singePrice){
        // Get Car data
        $data = Car::where('id',$id)->get();
        $calendar = Booking::where('car_id',$id)
        ->get();
        $month = Carbon::now('GMT+8')->format('M');

        return view('detail', compact('data','id','month','calendar'));
    }

    public function setbook($id, $singlePrice){
        // Get Car data
        $data = Car::where('id',$id)->get();
        $calendar = Booking::where('car_id',$id)
        ->get();
        $month = Carbon::now('GMT+8')->format('M');

        return view('detail', compact('data','id','month','calendar'));
    }

    public function savebook(Request $req){
        $now = Carbon::now('GMT+8')->format('YmdHis');
        $dateNow = Carbon::now('GMT+8')->format('Y-m-d');
        $bookCode = 'PBCR'.$now;
        // Cek booking date
        $start = Booking::where([
            ['car_id',$req->id],
            ['booking_date',$req->start],
        ])->count(); 
        // Jika tgl sama maka > 0
        $end = Booking::where([
            ['car_id',$req->id],
            ['return_date',$req->end],
        ])->count();
        // Jika tgl sama maka > 0
        // dd($start, $end);

        if (($start == 0) && ($end == 0)) {
            User::where('id', Auth::user()->id)->update([
                'phone' => $req->phone,
                'address' => $req->address,
                'residence_idcard' => $req-> idcard,
            ]);
            
            $book = new Booking;
            $book->book_code = $bookCode;
            $book->user_id = Auth::user()->id;
            $book->car_id = $req->id;
            $book->booking_date = $req->start;
            $book->return_date = $req->end;
            $book->save();
            
            $bookId = Booking::where('book_code',$bookCode)->pluck('id');

            $pay = new Payment;
            $pay->invoice = $bookCode;
            $pay->booking_id = $bookId[0];
            $pay->payment_date = $dateNow;
            $pay->fines = 0;
            $pay->total = $req->grandtotal;
            $pay->changes = 0;
            $pay->overtime = 0;
            $pay->save();

            alert()->success('Welcome',Auth::user()->name.' please confirm your payment to get invoice');
            return redirect()->route('dashboard');

        } else {
            alert()->warning('Warning','Booking date is full, please choose another date');
            return redirect()->back()->withInput();
        }
    }

    public function hisBook(){
        if(Auth::user()->access == "user"){
            $data = Booking::join('users','bookings.user_id','=','users.id')
            ->join('cars','bookings.car_id','=','cars.id')
            ->where('user_id',Auth::user()->id)
            ->orderBy('bookings.id', 'desc')
            ->get();
            return view('admin.historybook', compact('data'));
        }else{
            $data = Booking::join('users','bookings.user_id','=','users.id')
            ->join('cars','bookings.car_id','=','cars.id')
            ->orderBy('bookings.id', 'desc')
            ->get();
            return view('admin.historybook', compact('data'));
        }
    }

    public function return(){
        $data = Payment::join('bookings','payments.booking_id','=','bookings.id')
        ->where('booking_status','=','on the road')
        ->get();
        return view('admin.return', compact('data'));
    }

    public function returnEdit($invoice){
        $data = Payment::join('bookings','payments.booking_id','=','bookings.id')
        ->where('invoice',$invoice)
        ->get();
        return view('admin.edit.returnedit',compact('data'));
    }

    public function returnUpdate(Request $req){
        $invoice = $req->invoice;
        Payment::where('invoice',$req->invoice)->update([
            'fines' => $req->fines,
            'overtime' => $req->overtime,
        ]);

        Booking::where('book_code',$req->invoice)->update([
            'booking_status' => 'return',
        ]);

        $data = Payment::join('bookings','payments.booking_id','=','bookings.id')
        ->where('invoice',$invoice)
        ->get();

        $duration = $req->duration;
        $overtime = $req->overtime;
        $fines = $req->fines;
        // dd($fines);

        $pdf = PDF::loadview('print.return',compact('data','duration','invoice','overtime','fines'));
        return $pdf->download('Return_'.$invoice.'.pdf');
    }
}
