@extends('layouts.main')
@section('title','Report')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card text-center">
            <div class="card-header">
                Laporan Booking
            </div>
            <div class="card-body">
                <a href="{{ route('report.book') }}" class="btn btn-primary"><i class="fas fa-book"></i> Cari Laporan</a>
            </div>
            <div class="card-footer text-muted">
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card text-center">
            <div class="card-header">
                Laporan Pembayaran
            </div>
            <div class="card-body">
                <a href="{{ route('report.pay') }}" class="btn btn-success"><i class="far fa-file"></i> Cari Laporan</a>
            </div>
            <div class="card-footer text-muted">
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card text-center">
            <div class="card-header">
                Laporan Mobil
            </div>
            <div class="card-body">
                <a href="{{ route('car.pdf') }}" class="btn btn-info"><i class="fas fa-car"></i> Cari Laporan</a>
            </div>
            <div class="card-footer text-muted">
            </div>
        </div>
    </div>
</div>

@endsection
