@extends('layouts.main')
@section('title','Data Kerusakan')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Kerusakan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="{{ route('damage.create') }}" class="btn btn-success mb-3">
                    <i class="fas fa-wrench"></i> Catat Kerusakan
                </a>
                <div class="table-responsive">

                    <table id="datatb" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mobil</th>
                                <th>Transmisi</th>
                                <th>Kilometer</th>
                                <th>Kategory Kerusakan</th>
                                <th>Jumlah Kerusakan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @forelse($data as $o)
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $o->car_name }} </td>
                                <td> {{ $o->transmition == "AT"?"Automatic":"Manual" }} </td>
                                <td> {{ number_format($o->kilometers, 0, ',', '.') }} KM</td>
                                <td> {{ $o->category }} </td>
                                <td> {{ $o->damage_count }} </td>
                                <td>
                                    <a href="{{ route('damage.show',$o->car_id) }}" class="btn btn-info"
                                        data-toggle="tooltip" data-placement="top" title="Detail"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="{{ route('damage.edit',$o->car_id) }}" class="btn btn-primary"
                                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                                            class="fas fa-pencil-alt"></i></a>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">no data available</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Mobil</th>
                                <th>Transmisi</th>
                                <th>Kilometer</th>
                                <th>Kategory Kerusakan</th>
                                <th>Jumlah Kerusakan</th>
                                <th>Action</th>
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
<script>
    $(function () {
        $("#datatb").DataTable();
    });

</script>
@endpush
