@extends('layouts.main')
@section('title','Kerusakan')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Kerusakan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <!-- Plat Nomor -->
                        <div class="form-group">
                            <label for="plate">Plat Nomor</label>
                            <input type="text" class="form-control" id="plate" name="plate" placeholder="Plat Nomor"
                                value="{{ $car->plate_number }}" readonly required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Car -->
                        <div class="form-group">
                            <label for="car">Mobil</label>
                            <input type="hidden" name="car_id" id="car_id" value="{{ $car->id }}" required>
                            <input type="text" class="form-control" id="car_name" name="car_name" placeholder="Mobil"
                                value="{{ $car->car_name }}" readonly required>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <!-- Transmisi -->
                        <div class="form-group">
                            <label for="transmition">transmition</label>
                            <input type="text" class="form-control" id="transmition" name="transmition"
                                placeholder="Transmisi" value="{{ $car->transmition }}" readonly required>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <!-- Transmisi -->
                        <div class="form-group">
                            <label for="tahun">Tahun Perakitan</label>
                            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun Rakit"
                                value="{{ $car->tahun }}" readonly required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped" id="datatb">
                            <thead>
                                <tr>
                                    <th>Tanggal Kerusakan</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $o)
                                <tr>
                                    <th>{{ Carbon\Carbon::parse($o->created_at)->format('j F Y') }}</th>
                                    <th>{{ $o->category }}</th>
                                    <th>{{ $o->description }}</th>
                                    <th>
                                        <form action="{{ route('damage.update',$o->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success"><i class="fas fa-wrench" data-toggle="tooltip" data-placement="top" title="Mark this damage has been fixed"></i></button>
                                        </form>
                                    </th>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="4">no data available</th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.component.modal.daftar-mobil')
@endsection

@push('after-script')
<script>
    $(function () {
        $("#datatb").DataTable();
    });
</script>
@endpush