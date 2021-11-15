@extends('layouts.main')
@section('title','Dashboard')

@section('content')
@if(Auth::user()->access == "user")
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $count_next }} Car</h3>

                <p>Next Bookings</p>
            </div>
            <div class="icon">
                <i class="fas fa-car"></i>
            </div>
            <a href="{{ route('car.list') }}" class="small-box-footer">
                Book Now <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $count_booking }} times</h3>

                <p>Total Bookings</p>
            </div>
            <div class="icon">
                <i class="fas fa-car"></i>
            </div>
            <a href="{{ route('car.list') }}" class="small-box-footer">
                Book Now <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>Rp {{ number_format($paid, 0, ',', '.') }}</h3>

                <p>Paid Payment</p>
            </div>
            <div class="icon">
                <i class="fas fa-check"></i>
            </div>
            <a href="{{ route('pay.history') }}" class="small-box-footer">
                History <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>Rp {{ number_format($unpaid, 0, ',', '.') }}</h3>

                <p>Unpaid Payment</p>
            </div>
            <div class="icon">
                <i class="fas fa-times"></i>
            </div>
            <a href="{{ route('pay.history') }}" class="small-box-footer">
                History <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Unpaid Payments</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatb" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Brand</th>
                                <th>Mobil</th>
                                <th>Booking Date</th>
                                <th>Return Date</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @forelse($data as $o)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td> {{ $o->book_code }} </td>
                                <td> {{ $o->booking->car->car_brand }} </td>
                                <td> {{ $o->booking->car->car_name }} </td>
                                <td> {{ Carbon\Carbon::parse($o->booking_date)->format('D d M Y') }} </td>
                                <td> {{ Carbon\Carbon::parse($o->return_date)->format('D d M Y') }} </td>
                                <td> Rp {{ number_format($o->total, 0, ',', '.') }} </td>
                                <td> {{ $o->payment_status }} </td>
                                <td>
                                    <a href="{{ route('confirm',$o->book_code) }}" class="btn btn-primary"
                                        data-toggle="tooltip" data-placement="top" title="Confirm Payment"><i
                                            class="fas fa-money-bill-wave"></i></a>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="13" class="text-center">no data available</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Brand</th>
                                <th>Mobil</th>
                                <th>Booking Date</th>
                                <th>Return Date</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@else
haha
@endif
@endsection

@push('after-script')
<script>
    $(function () {
        $("#datatb").DataTable();
    });

</script>
@endpush
