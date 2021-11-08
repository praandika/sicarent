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
                <h3 class="card-title">Data User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#createModal">
                    Tambah
                </button>

                <div class="form-group">
                  <label>Date and time:</label>
                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

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
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $o->id }}">
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

@include('admin.component.modal.modal-edit')
@include('admin.component.modal.modal-create')

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
