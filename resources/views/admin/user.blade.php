@extends('layouts.main')
@section('title','Data User')

@push('after-css')
<script src="{{ asset('tanya.js') }}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#createUser">
                    Tambah
                </button>
                    <div class="table-responsive">
                        <table id="datatb" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Gender</th>
                                    <th>Kontak</th>
                                    <th>Alamat</th>
                                    <th>Tgl Lahir</th>
                                    <th>Akses</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($no = 1)
                                @foreach($data as $o)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td> {{ $o->name }} </td>
                                    <td> {{ $o->email }} </td>
                                    <td> {{ $o->username }} </td>
                                    <td> {{ $o->gender == '1' ? 'Laki-laki' : 'Perempuan'  }} </td>
                                    <td> {{ $o->phone }} </td>
                                    <td> {{ $o->address }} </td>
                                    <td> {{ $o->birthday }} </td>
                                    <td> {{ $o->access }} </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editUser{{ $o->id }}">
                                            Edit
                                        </button>
                                        </th>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Gender</th>
                                    <th>Kontak</th>
                                    <th>Alamat</th>
                                    <th>Tgl Lahir</th>
                                    <th>Akses</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

            </div>
        </div>
    </div>
</div>

@include('admin.component.modal.user-edit')
@include('admin.component.modal.user-create')

@endsection

@push('after-script')
<script>
    $(function () {
        $("#datatb").DataTable();
    });

    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

</script>
@endpush
