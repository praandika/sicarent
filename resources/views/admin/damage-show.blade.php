@extends('layouts.main')
@section('title','Kerusakan Mobil')

@push('after-css')
<script src="{{ asset('tanya.js') }}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Kerusakan Mobil</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('images/car/'.$car->image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-6">
                        <h2>{{ $car->car_brand }} {{ $car->car_name }}</h2>
                        <h3>{{ $car->plate_number }} / {{ $car->transmition }}</h3>
                        <h3>{{ $car->engine_vol }} CC / Tahun {{ $car->car_year }}</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $o)
                                <tr>
                                    <th>{{ $o->category }}</th>
                                    <th>{{ $o->description }}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')
<script>
    $(function () {
        $("#datatb").DataTable();
    });

</script>
@endpush
