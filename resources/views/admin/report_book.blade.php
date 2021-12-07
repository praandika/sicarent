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
                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{ route('report.book.search') }}" class="form-row">
                            <div class="col">
                                <label for="awal" class="sr-only">Periode awal</label>
                                <input type="date" class="form-control" id="awal" name="awal" value="{{ old('awal') }}">
                            </div>
                            <div class="col">
                                <label for="akhir" class="sr-only">Periode akhir</label>
                                <input type="date" class="form-control" id="akhir" name="akhir"
                                    value="{{ old('akhir') }}">
                            </div>

                            <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i>
                                Cari</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{ route('report.book.search_name') }}" class="form-row">
                            <div class="col">
                                <label for="nama" class="sr-only">Search by Name</label>
                                <select name="nama" id="nama" class="js-select-2">
                                    <option value="">Search by Name</option>
                                    @forelse($nama as $a)
                                    <option value="{{ $a->id }}">{{ $a->name }}</option>
                                    @empty
                                    <option readonly>no data</option>
                                    @endforelse
                                </select>

                                <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i>
                                    Cari</button>
                            </div>
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

<script>
    $(document).ready(function () {
        $('.js-select-2').select2();
    });

</script>
@endpush
