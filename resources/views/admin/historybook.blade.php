@extends('layouts.main')
@section('title','Booking')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Booking</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatb" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Mobil</th>
                                <th>Booking Date</th>
                                <th>Return Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @forelse($data as $o)
                            <tr>
                                <td> {{ $no++  }} </td>
                                <td> {{ $o->book_code }} </td>
                                <td> {{ $o->car_name }} </td>
                                <td> {{ Carbon\Carbon::parse($o->booking_date)->format('D d M Y') }} </td>
                                <td> {{ Carbon\Carbon::parse($o->return_date)->format('D d M Y') }} </td>
                                <td> {{ $o->booking_status  }} </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">no data available</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Mobil</th>
                                <th>Booking Date</th>
                                <th>Return Date</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')
<script src="{{ asset('tanya.js') }}"></script>

<script>
    $(function () {
        $("#datatb").DataTable();
    });
</script>
@endpush