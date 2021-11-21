@extends('layouts.main')
@section('title','Kerusakan')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Kerusakan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <button class="btn btn-success" data-toggle="modal" data-target="#daftarMobil"><i
                                class="fas fa-car"></i> Pilih Mobil</button>
                    </div>
                </div>
                <form action="{{ route('damage.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3">
                            <!-- Plat Nomor -->
                            <div class="form-group">
                                <label for="plate">Plat Nomor</label>
                                <input type="text" class="form-control" id="plate" name="plate" placeholder="Plat Nomor"
                                    readonly required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Car -->
                            <div class="form-group">
                                <label for="car">Mobil</label>
                                <input type="hidden" name="car_id" id="car_id" required>
                                <input type="text" class="form-control" id="car_name" name="car_name"
                                    placeholder="Mobil" readonly required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <!-- Transmisi -->
                            <div class="form-group">
                                <label for="transmition">transmition</label>
                                <input type="text" class="form-control" id="transmition" name="transmition"
                                    placeholder="Transmisi" readonly required>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <!-- Transmisi -->
                            <div class="form-group">
                                <label for="tahun">Tahun Perakitan</label>
                                <input type="text" class="form-control" id="tahun" name="tahun"
                                    placeholder="Tahun Rakit" readonly required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="wrapper-damages" id="wrapper-damages">
                                <!-- Container input dinamis -->
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-success add">
                                Tambah Baris
                            </button>
                        </div>
                    </div>

                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>

                <div class="copy d-none">
                    <div class="row control-row">
                        <div class="col-lg-2">
                            <label>Kategory Kerusakan</label>
                            <div class="form-group mb-3">
                                <select class="form-control select2" name="category[]" id="category" required>
                                    <option value="Body">Body</option>
                                    <option value="Mesin">Mesin</option>
                                    <option value="Lampu">Lampu</option>
                                    <option value="Ban">Ban</option>
                                    <option value="Interior">Interior</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <label>Kategory Kerusakan</label>
                            <div class="form-group mb-3">
                                <input type="text" name="description[]" id="description" class="form-control" placeholder="Deskripsi kerusakan..." required>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <label>Remove</label>
                            <div class="form-group mb-3">
                                <button type="button" class="btn btn-danger remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
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
    $(document).ready(function () {
        $(".add").click(function () {
            let html = $(".copy").html();
            $(".wrapper-damages").append(html);
        });
    });

    $("body").on("click", ".remove", function () {
        $(this).parents(".control-row").remove();
    });

</script>
@endpush
