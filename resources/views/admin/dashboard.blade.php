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
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>Rp {{ number_format($incomeMonth, 0, ',', '.') }}</h3>

                <p>Pendapatan Bulan Ini</p>
            </div>
            <div class="icon">
                <i class="fas fa-wallet"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>Rp {{ number_format($incomeDay, 0, ',', '.') }}</h3>

                <p>Pendapatan Hari Ini</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-invoice-dollar"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $customer }}</h3>

                <p>Customer</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>Rp {{ number_format($unpaid, 0, ',', '.') }}</h3>

                <p>Belum Dibayar</p>
            </div>
            <div class="icon">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa-check"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Booking {{ $month }}</span>
                <span class="info-box-number">{{ $bookedCar }}</span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-star"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Mobil Favorite</span>
                <span class="info-box-number">{{ $favorite }}</span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Automatic</span>
                <span class="info-box-number">{{ $at }}</span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-cogs"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Manual</span>
                <span class="info-box-number">{{ $mt }}</span>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-lg-12 text-center">
        <label for="">Kerusakan Mobil</label>
    </div>
</div>
<div class="row">
    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-cogs"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Mesin</span>
                <span class="info-box-number">{{ $engineDam }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>

    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-car-crash"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Body</span>
                <span class="info-box-number">{{ $bodyDam }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>

    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-fire-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Lampu</span>
                <span class="info-box-number">{{ $lampDam }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>

    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-truck-monster"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Ban</span>
                <span class="info-box-number">{{ $tireDam }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>

    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="far fa-caret-square-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Interior</span>
                <span class="info-box-number">{{ $interiorDam }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>

    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-wrench"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Lainnya</span>
                <span class="info-box-number">{{ $otherDam }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
</div>
<hr>
<!-- Chart's container -->
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Booking {{ $yearNow }} vs {{ $yearLast }}</h5>
        <div id="chart" style="height: 300px;"></div>
    </div>
</div>

<!-- Chart's container -->
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Favorite Car</h5>
        <div id="chartCar" style="height: 300px;"></div>
    </div>
</div>

@endif
@endsection

@push('after-script')
<!-- Charting library -->
<script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
<!-- Your application script -->
<script>
    const chart = new Chartisan({
        el: '#chart',
        url: '@chart("booking_chart")',
        hooks: new ChartisanHooks()
            .legend({
                position: 'bottom'
            })
            .datasets(['bar', 'bar', {
                type: 'line',
                fill: false
            }])
    });

</script>

<script>
    const chartCar = new Chartisan({
        el: '#chartCar',
        url: '@chart("car_chart")',
        hooks: new ChartisanHooks()
            .legend({
                position: 'bottom'
            })
    });

</script>

<script>
    $(function () {
        $("#datatb").DataTable();
    });

</script>
@endpush
