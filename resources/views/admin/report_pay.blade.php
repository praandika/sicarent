@extends('layouts.main')
@section('title','Payment')

@push('after-css')
<script src="{{ asset('tanya.js') }}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Payment</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
                    <div class="col-lg-8">
                        <form action="{{ route('report.pay.search') }}" class="form-inline">
                            <div class="form-group mb-2">
                                <label for="awal" class="sr-only">Periode awal</label>
                                <input type="date" class="form-control" id="awal" name="awal" value="{{ old('awal') }}">
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="akhir" class="sr-only">Periode akhir</label>
                                <input type="date" class="form-control" id="akhir" name="akhir"
                                    value="{{ old('akhir') }}">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i>
                                Cari</button>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatb" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Mobil</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @forelse($data as $o)
                            <tr>
                                <td> {{ $no++  }} </td>
                                <td> {{ $o->invoice }} </td>
                                <td> {{ $o->booking->car->car_name }} </td>
                                <td> Rp {{ number_format($o->total, 0, ',', '.') }} </td>
                                <td> {{ $o->payment_status  }} </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">no data available</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Mobil</th>
                                <th>Total</th>
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
