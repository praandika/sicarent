@extends('layouts.main')
@section('title','Tambah Mobil')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Mobil</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('car.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Car -->
                    <div class="form-group">
                        <label for="car">Mobil</label>
                        <input type="text" class="form-control" id="car" name="car_name"
                            placeholder="Masukkan nama mobil..." value="{{ old('car') }}" required>
                    </div>
                    <!-- Brand -->
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="brand" id="brand" class="form-control" name="car_brand" placeholder="Masukkan brand..."
                            value="{{ old('brand') }}" required>
                    </div>
                    <!-- Transmisi -->
                    <div class="form-group">
                        <label for="transmition">Transmisi</label>
                        <select class="form-control" id="transmition" name="transmition"
                            value="{{ old('transmition') }}" required>
                            <option value="AT">Automatic</option>
                            <option value="MT">Manual</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>
                    <!-- Car type -->
                    <div class="form-group">
                        <label for="type">Tipe Mobil</label>
                        <select class="form-control" id="type" name="car_type" value="{{ old('type') }}" required>
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
                            placeholder="Masukkan CC kendaraan..." value="{{ old('volume') }}" required>
                    </div>
                    <!-- Capacity -->
                    <div class="form-group">
                        <label for="capacity">Kapasitas Mobil</label>
                        <input type="number" id="capacity" class="form-control" name="car_capacity"
                            placeholder="Masukkan kapasitas..." value="{{ old('capacity') }}" required>
                    </div>

                    <!-- Car Year -->
                    <div class="form-group">
                        <label for="car_year">Tahun Mobil</label>
                        <input type="number" id="car_year" class="form-control" name="car_year"
                            placeholder="Masukkan tahun takit..." value="{{ old('car_year') }}" required>
                    </div>

                    <!-- Bahan Bakar -->
                    <div class="form-group">
                        <label for="fuel">Bahan Bakar</label>
                        <input type="text" id="fuel" class="form-control" name="fuel"
                            placeholder="Masukkan bahan bakar..." value="{{ old('fuel') }}" required>
                    </div>
                    <!-- Plat Nomor -->
                    <div class="form-group">
                        <label for="plate_number">Nomor Polisi</label>
                        <input type="text" id="plate_number" class="form-control" name="plate_number"
                            placeholder="Masukkan nomor polisi..." value="{{ old('plate_number') }}" required>
                    </div>
                    <!-- Harga -->
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="text" id="price" class="form-control" name="price"
                            placeholder="Masukkan harga..." value="{{ old('price') }}" required>
                    </div>
                    <!-- Featured Image -->
                    <div class="form-group">
                        <label for="price">Foto Mobil</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
