@extends('layouts.landing-app')
@section('landing-content')

@include('component.navigation')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset("images/bg_1.jpg") }}');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <h1 class="mb-3 bread">Confirm Payment</h1>
            </div>
        </div>
    </div>
</section>

<!-- Confirm Form -->
<section class="ftco-section bg-light">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('payment.edit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach($data as $o)
                    <div class="row">
                        <div class="col-lg-6">
                            <h2>{{ $o->invoice }}</h2>
                            <input type="hidden" name="invoice" value="{{ $o->invoice }}">
                        </div>
                        <div class="col-lg-6 text-right">
                            <h2>{{ strtoUpper($o->payment_status) }}</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table-striped">
                                <tr>
                                    <th>Payment date</th>
                                    <th>: {{ $o->payment_date }}</th>
                                </tr>
                                <tr>
                                    <th>Car</th>
                                    <th>: {{ $o->booking->car->car_name }}</th>
                                </tr>
                                <tr>
                                    <th>Booking Date</th>
                                    <th>: {{ Carbon\Carbon::parse($o->booking_date)->format('D d M Y') }}</th>
                                </tr>
                                <tr>
                                    <th>Return Date</th>
                                    <th>: {{ Carbon\Carbon::parse($o->return_date)->format('D d M Y') }}<th>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <th>: Rp {{ number_format($o->total, 0, ',', '.') }}<th>
                                </tr>
                            </table>
                            <h4 class="mt-3">Transfer to BCA a/n Arya</h4>
                            <h4 style="color: blue;">6254172879</h4>
                            <label for="">Upload Payment Proof</label> <br>
                            <input type="file" name="proof" id="proof" required> <br>
                            <button type="submit" class="btn btn-secondary py-3 px-4 mt-3">Confirm Payment</button>
                        </div>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</section>
@include('component.footer')
@endsection
