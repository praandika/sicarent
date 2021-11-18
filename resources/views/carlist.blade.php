@extends('layouts.landing-app')

@section('landing-content')
@include('component.navigation')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset("images/bg_1.jpg") }}');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('landing.page') }}">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Choose Your Car <i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Choose Your Car</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            @forelse($data as $o)
            <div class="col-md-4">
                <div class="car-wrap rounded ftco-animate">
                    <div class="img rounded d-flex align-items-end" style="background-image: url('{{ asset("images/car/$o->image") }}');">
                    </div>
                    <div class="text">
                        <h2 class="mb-0"><a href="car-single.html">{{ $o->car_name }}</a></h2>
                        <div class="d-flex mb-3">
                            <span class="cat">{{ $o->car_brand }}</span>
                            <p class="price ml-auto">Rp {{ number_format($o->price, 0, ',', '.') }} / Day(s)</p>
                        </div>
                        @if( (!Auth::user()) || (Auth::user()->access == 'user'))
                        <a href="{{ url('detail/2/'.$o->id.'/'.$o->price) }}"
                                class="btn btn-primary py-2 mr-1">Book
                                now</a> 
                        @else
                        <a href="#"
                                class="btn btn-primary py-2 mr-1">Book
                                now</a>
                        @endif
                        <a href="{{ route('look',$o->id) }}" class="btn btn-secondary py-2 ml-1">Details</a></p></p>
                    </div>
                </div>
            </div>
            @empty
            <div class="row text-center">
                <h4>no data avaliable</h4>
            </div>
            @endforelse
        </div>
    </div>
</section>

@include('component.footer')
@endsection
