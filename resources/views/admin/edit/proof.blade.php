@extends('layouts.main')
@section('title','Cek Bukti Pembayaran')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cek Bukti Pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @foreach($data as $o)
                <form action="{{ route('proof.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="invoice" value="{{ $o->invoice }}">
                    <div class="row">
                        <img src="{{ asset('photos/proof/'.$o->proof) }}" height="500px">
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Paid</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
