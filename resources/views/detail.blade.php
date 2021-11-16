@extends('layouts.landing-app')
@section('landing-content')
@push('before-css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
@endpush

@push('after-css')
<style>
    .fc-title {
        color: #fff !important;
    }

</style>
@endpush
@include('component.navigation')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset("images/bg_1.jpg") }}');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="{{ route('landing.page') }}">Home <i
                                class="ion-ios-arrow-forward"></i></a></span>
                    <span>Booking <i class="ion-ios-arrow-forward"></i></span>
                </p>
                <h1 class="mb-3 bread">Booking</h1>
            </div>
        </div>
    </div>
</section>

<!-- Booking Form -->
<section class="ftco-section bg-light">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('savebook') }}" method="post">
                    @csrf
                    @foreach($data as $o)
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="hidden" value="{{ $o->car_capacity }}" name="capacity">
                            <input type="hidden" value="{{ $o->transmition }}" name="transmition">
                            <img src="{{ asset('images/car/'.$o->image) }}" style="width: 500px;"
                                class="img-fluid mb-3">

                        </div>
                        <div class="col-lg-6">
                            <table>
                                <tr colspan="2">
                                    <h3>{{ $o->car_brand }} {{ $o->car_name }}</h3>
                                </tr>
                                <tr>
                                    <td>Capacity</td>
                                    <td>: {{ $o->car_capacity }}</td>
                                </tr>
                                <tr>
                                    <td>Transmition</td>
                                    <td>: {{ $o->transmition == "AT" ? "Automatic" : "Manual" }}</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>: {{ $o->car_type }}</td>
                                </tr>
                                <tr>
                                    <td>Volume</td>
                                    <td>: {{ $o->engine_vol }}</td>
                                </tr>
                                <tr>
                                    <td>Plate Number</td>
                                    <td>: {{ $o->plate_number }}</td>
                                </tr>
                                <tr>
                                    <td>Car Year</td>
                                    <td>: {{ $o->car_year }}</td>
                                </tr>
                                <tr>
                                    <td>Fuel</td>
                                    <td>: {{ $o->fuel }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Price</h5>
                                    </td>
                                    <td><strong>
                                            <h5>: Rp {{ number_format($o->price, 0, ',', '.') }} / Day(s)</h5>
                                        </strong></td>
                                    <input type="hidden" id="price" name="price" value="{{ $o->price }}">
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Duration</h5>
                                    </td>
                                    <td>
                                        <h5>: <span id="duration"></span> day(s)</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>Total</h3>
                                    </td>
                                    <td>
                                        <h3 style="color: royalblue !important;">: <span id="total"></span></h3>
                                    </td>
                                    <input type="hidden" name="grandtotal" id="inputTotal">
                                </tr>
                            </table>
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-lg-6 mb-3 mt-3">
                            <strong>
                                <h4>- Personal Data -</h4>
                            </strong>
                        </div>
                        <div class="col-lg-6 mb-3 mt-3">
                            <strong>
                                <h4>- Pick Your Date -</h4>
                            </strong>
                        </div>
                    </div>
                    <div class="row" style="border: 4px dotted black; padding: 10px;">
                        <div class="col-lg-6"
                            style="box-shadow: -20px -3px 21px -9px rgba(212,212,212,0.75); padding: 10px;">
                            <div class="row">
                                <div class="form-group">
                                    <label for="" class="label">Phone</label>
                                    <input type="text" class="form-control" name="phone"
                                        placeholder="Enter your contact (Whatsapp)" value="{{ old('phone') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="" class="label">ID Card (KTP/Passpor)</label>
                                    <input type="text" class="form-control" name="idcard"
                                        placeholder="Enter your ID Card Number" value="{{ old('idcard') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="" class="label">Address</label>
                                    <input type="text" class="form-control" name="address"
                                        placeholder="Enter your Address" value="{{ old('address') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6"
                            style="box-shadow: -20px -3px 21px -9px rgba(212,212,212,0.75); padding: 10px;">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mr-2">
                                        <label for="" class="label"><strong>Select your booking date</strong></label>
                                        <input type="text" class="form-control" id="book_pick_date" name="start"
                                            placeholder="yyyy-mm-dd" value="{{ old('start') }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group ml-2">
                                        <label for="" class="label"><strong>Select your return date</strong></label>
                                        <input type="text" class="form-control" id="book_off_date" name="end"
                                            placeholder="yyyy-mm-dd" value="{{ old('end') }}" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-secondary btn-block py-3 px-4"><strong> Rent a Car
                                    Now</strong></button>
                        </div>
                    </div>
                    <hr>
                </form>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3><strong>Booking Calendar</strong></h3>
                    </div>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('component.footer')
@push('after-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function () {
        let price = $('#price').val();
        $('body').on('change', '#book_off_date', function () {
            let x = $('#book_pick_date').val();
            let y = $('#book_off_date').val();
            let price = $('#price').val();
            let start = moment(x).format('YYYYMD');
            let end = moment(y).format('YYYYMD');
            let duration = end - start;
            let total = price * duration;
            $('#duration').text(duration);
            $('#total').text(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(total));
            $('#inputTotal').val(total);
        });
    });

</script>
<script>
    $(document).ready(function () {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events: [
                @foreach($calendar as $o) {
                    title: '{{ $o->book_code }}',
                    start: '{{ $o->booking_date }}',
                    end: '{{ $o->return_date }}',
                },
                @endforeach
            ]
        })
    });

</script>
@endpush
@endsection
