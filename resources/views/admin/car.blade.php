@extends('layouts.main')
@section('title','Data Mobil')

@push('after-css')
<script src="{{ asset('tanya.js') }}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Mobil</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="{{ route('car.create') }}" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i> Tambah
                </a>
                <div class="table-responsive">
                    <form action="{{ route('car.delete.all') }}" method="POST">
                        @csrf
                        <table id="datatb" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="checkAll">
                                        <label for="checkAll">#</label>
                                    </th>
                                    <th>Status</th>
                                    <th>Mobil</th>
                                    <th>Brand</th>
                                    <th>Transmisi</th>
                                    <th>Tipe</th>
                                    <th>Volume</th>
                                    <th>Kapasitas</th>
                                    <th>Bahan Bakar</th>
                                    <th>Harga</th>
                                    <th>Nopol</th>
                                    <th>Tahun</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($no = 1)
                                @forelse($data as $o)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="pilih[]" id="checkData" value="{{ $o->id }}">
                                        {{ $no++ }}
                                    </td>
                                    <td> {{ $o->car_status }} </td>
                                    <td> {{ $o->car_name }} </td>
                                    <td> {{ $o->car_brand }} </td>
                                    <td> {{ $o->transmition  }} </td>
                                    <td> {{ $o->car_type }} </td>
                                    <td> {{ $o->engine_vol }} </td>
                                    <td> {{ $o->car_capacity }} </td>
                                    <td> {{ $o->fuel }} </td>
                                    <td> {{ $o->price }} </td>
                                    <td> {{ $o->plate_number }} </td>
                                    <td> {{ $o->car_year }} </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editMobil{{ $o->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">no data available</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Status</th>
                                    <th>Mobil</th>
                                    <th>Brand</th>
                                    <th>Transmisi</th>
                                    <th>Tipe</th>
                                    <th>Volume</th>
                                    <th>Kapasitas</th>
                                    <th>Bahan Bakar</th>
                                    <th>Harga</th>
                                    <th>Nopol</th>
                                    <th>Tahun</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="row">
                            <div class="col-lg-12 mt-3 mb-3">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return tanya('Data yang dipilih akan terhapus permanen, lanjutkan?')">
                                    <i class="fas fa-trash"></i>
                                    Hapus Terpilih
                                </button>
                            </div>
                        </div>
                    </form>
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

    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
@endpush
