@extends('layouts.landing-app')
@section('landing-content')

@include('component.navigation')
    @include('component.hero')
    @include('component.booking-tool')
    @include('component.daftar-mobil')
    @include('component.about')
    @include('component.services')
    @include('component.footer')
@endsection