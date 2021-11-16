<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Booking;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function confirm($invoice){
        $data = Payment::join('bookings','payments.booking_id','=','bookings.id')
            ->where('invoice',$invoice)
            ->get();
        return view('confirm',compact('data'));
    }

    public function paymentEdit(Request $req){
        $proof = $req->file('proof');
        $file_name = time()."_".$proof->getClientOriginalName();
        $dir_proof = 'photos/proof';
        $proof->move($dir_proof,$file_name);

        Booking::where('book_code',$req->invoice)->update([
            'booking_status' => "on the road",
        ]);

        Payment::where('invoice',$req->invoice)->update([
            'payment_status' => "paid",
            'proof' => $file_name,
        ]);

        return redirect('invoice/'.$req->invoice);
    }

    public function invoice($invoice){
        $data = Payment::join('bookings','payments.booking_id','=','bookings.id')
            ->where('invoice',$invoice)
            ->get();
        return view('invoice', compact('data'));
    }

    public function printInvoice($invoice){
        $data = Payment::join('bookings','payments.booking_id','=','bookings.id')
            ->where('invoice',$invoice)
            ->get();
        
            $tglA = Payment::join('bookings','payments.booking_id','=','bookings.id')
            ->where('invoice',$invoice)
            ->pluck('booking_date');
            

            $tglB = Payment::join('bookings','payments.booking_id','=','bookings.id')
            ->where('invoice',$invoice)
            ->pluck('return_date');
            

            $start = Carbon::parse($tglA[0])->format('Ymd');
            
            $end = Carbon::parse($tglB[0])->format('Ymd');

            $duration = $end - $start;

        $pdf = PDF::loadview('print.invoice',compact('data','duration','invoice'));
        return $pdf->download('Invoice_'.$invoice.'.pdf');
    }

    public function hisPay(){
        if(Auth::user()->access == "user"){
            $data = Payment::join('bookings','payments.booking_id','=','bookings.id')
            ->where('bookings.user_id',Auth::user()->id)
            ->get();
            return view('admin.historypay', compact('data'));
        }else{
            $data = Payment::join('bookings','payments.booking_id','=','bookings.id')
            ->get();
            return view('admin.historypay', compact('data'));
        }
    }
}
