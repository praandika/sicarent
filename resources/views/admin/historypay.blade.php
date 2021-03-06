@extends('layouts.main')
@section('title','Payment')

@push('after-css')
<script src="{{ asset('tanya.js') }}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Payment</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatb" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Nama</th>
                                <th>Mobil</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Cetak Invoice</th>
                                @if(Auth::user()->access == "admin")
                                <th>Cek Bukti</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @forelse($data as $o)
                            <tr>
                                <td> {{ $no++  }} </td>
                                <td> {{ $o->invoice }} </td>
                                <td> {{ $o->booking->user->name }} </td>
                                <td> {{ $o->booking->car->car_name }} </td>
                                <td> Rp {{ number_format($o->total, 0, ',', '.') }} </td>
                                <td> {{ $o->payment_status  }} </td>
                                @if($o->payment_status == "pending")
                                <td>
                                    <button disabled="disabled" class="btn btn-secondary"><i class="fas fa-print"></i> Print</button>
                                </td>
                                @else
                                <td>
                                    <a href="{{ url('print/'.$o->invoice) }}" class="btn btn-success"><i class="fas fa-print"></i> Print</a>
                                </td>
                                @endif
                                
                                @if(Auth::user()->access == "admin")
                                <td> <a href="{{ route('proof.edit',$o->invoice) }}"  class="btn btn-primary"><i class="far fa-sticky-note"></i> Bukti</a> </td>
                                @endif
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">no data available</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Nama</th>
                                <th>Mobil</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Cetak Invoice</th>
                                @if(Auth::user()->access == "admin")
                                <th>Cek Bukti</th>
                                @endif
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
@endpush
