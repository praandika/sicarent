@extends('layouts.main')
@section('title','Edit Mobil')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Mobil</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @foreach($data as $o)
                <form action="{{ route('car.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $o->id }}">
                    <div class="row">
                        <img src="{{ asset('images/car/'.$o->image) }}">
                        <input type="hidden" value="{{ $o->image }}" name="img_prev">
                        <div class="col-lg-12">
                            <!-- Featured Image -->
                            <div class="form-group">
                                <label for="price">Foto Mobil</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <small style="color: red;">
                                File type: *jpg|jpeg|png* ukuran maksimal width: *600px
                            </small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <!-- Car -->
                            <div class="form-group">
                                <label for="car">Mobil</label>
                                <input type="text" class="form-control" id="car" name="car_name"
                                    placeholder="Ubah nama mobil..." value="{{ $o->car_name }}" required>
                            </div>
                            <!-- Brand -->
                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <input type="text" id="brand" class="form-control" name="car_brand"
                                    placeholder="Ubah brand..." value="{{ $o->car_brand }}" required>
                            </div>
                            <!-- Transmisi -->
                            <div class="form-group">
                                <label for="transmition">Transmisi</label>
                                <select class="form-control" id="transmition" name="transmition" required>
                                    @if($o->transmition == "AT")
                                    <option value="AT">Automatic</option>
                                    <option value="MT">Manual</option>
                                    <option value="other">Lainnya</option>
                                    @elseif($o->transmition == "MT")
                                    <option value="MT">Manual</option>
                                    <option value="AT">Automatic</option>
                                    <option value="other">Lainnya</option>
                                    @else
                                    <option value="other">Lainnya</option>
                                    <option value="MT">Manual</option>
                                    <option value="AT">Automatic</option>
                                    @endif
                                </select>
                            </div>
                            <!-- Car type -->
                        </div>

                        <div class="col-lg-4">
                            <!-- Car Type -->
                            <div class="form-group">
                                <label for="type">Tipe Mobil</label>
                                <select class="form-control" id="type" name="car_type" required>
                                    <option value="{{ $o->car_type }}">{{ $o->car_type }}</option>
                                    <option disabled>--------------------------</option>
                                    <option value="SUV">SUV</option>
                                    <option value="MPV">MPV</option>
                                    <option value="Hatchback">Hatchback</option>
                                    <option value="Station Wagon">Station Wagon</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="Convertible">Convertible</option>
                                    <option value="Coupe">Coupe</option>
                                    <option value="Double Cabin">Double Cabin</option>
                                </select>
                            </div>
                            <!-- Volume -->
                            <div class="form-group">
                                <label for="volume">Volume Silinder</label>
                                <input type="number" id="volume" class="form-control" name="engine_vol"
                                    placeholder="Ubah CC kendaraan..." value="{{ $o->engine_vol }}" required>
                            </div>
                            <!-- Capacity -->
                            <div class="form-group">
                                <label for="capacity">Kapasitas Mobil</label>
                                <input type="number" id="capacity" class="form-control" name="car_capacity"
                                    placeholder="Ubah kapasitas..." value="{{ $o->car_capacity }}" required>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <!-- Car Year -->
                            <div class="form-group">
                                <label for="car_year">Tahun Mobil</label>
                                <input type="number" id="car_year" class="form-control" name="car_year"
                                    placeholder="Ubah tahun rakit..." value="{{ $o->car_year }}" required>
                            </div>

                            <!-- Bahan Bakar -->
                            <div class="form-group">
                                <label for="fuel">Bahan Bakar</label>
                                <input type="text" id="fuel" class="form-control" name="fuel"
                                    placeholder="Ubah bahan bakar..." value="{{ $o->fuel }}" required>
                            </div>
                            <!-- Plat Nomor -->
                            <div class="form-group">
                                <label for="plate_number">Nomor Polisi</label>
                                <input type="text" id="plate_number" class="form-control" name="plate_number"
                                    placeholder="Ubah nomor polisi..." value="{{ $o->plate_number }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <!-- Harga -->
                            <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="text" id="price" class="form-control" name="price"
                                    placeholder="Ubah harga..." value="{{ $o->price }}" required>
                            </div>
                        </div>
                    </div>

                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
