@extends('layouts.landing-app')
@section('landing-content')

@include('component.navigation')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('landing.page') }}">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Choose <i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Choose Your Car</h1>
            </div>
        </div>
    </div>
</section>

<!-- Daftar Mobil -->
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">

            @forelse($data as $o)

            <div class="col-md-4">
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="id" value="{{ $o->id }}">

                @csrf
                <div class="car-wrap rounded ftco-animate">
                    <div class="img rounded d-flex align-items-end"
                        style="background-image:  url('{{ asset("images/car/$o->image") }}');">
                        <input type="hidden" value="{{ $o->image }}" name="image">
                    </div>
                    <div class="text">
                        <h2 class="mb-0"><a href="car-single.html">{{ $o->car_name }}</a></h2>
                        <div class="d-flex mb-3">
                            <span class="cat">{{ $o->car_brand }}</span>
                            <input type="hidden" name="price" value="{{ $o->price }}">
                            <p class="price ml-auto">Rp {{ number_format($o->price, 0, ',', '.') }}
                                <span>/day</span>
                            </p>
                        </div>
                        <div class="row">
                            <a href="{{ url('detail/'.$token.'/'.$o->id.'/'.$o->price) }}" class="btn btn-block btn-primary">Book now</a>
                        </div>
                    </div>
                </div>

            </div>
            @empty
            <div style="margin: auto;">
                <p>no cars avaliable</p>
            </div>
            @endforelse

        </div>
    </div>
</section>
@include('component.footer')
@endsection
