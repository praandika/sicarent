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
                                class="ion-ios-arrow-forward"></i></a></span> <span>Car details <i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Car Details</h1>
            </div>
        </div>
    </div>
</section>
@forelse($data as $o)
<section class="ftco-section ftco-car-details">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="ca
					r-details">
                    <div class="img rounded" style="background-image: url(images/bg_1.jpg);"></div>
                    <div class="text text-center">
                        <span class="subheading">{{ $o->car_brand }}</span>
                        <h2>{{ $o->car_name }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-car"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Type
                                    <span>{{ $o->car_type }}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-pistons"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Transmition
                                    <span>{{ $o->transmition == "AT" ? "Automatic" : "Manual" }}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-car-seat"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Capacity
                                    <span>{{ $o->car_capacity }} Person</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-diesel"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Fuel
                                    <span>{{ $o->fuel }}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="row">
                    <div class="col-lg-8">
                        <img src="{{ asset('images/car/'.$o->image) }}" class="img-fluid">
                    </div>
                    <div class="col-lg-4 my-auto">
                        <a href="{{ url('detail/2/'.$o->id.'/'.$o->price) }}"
                                class="btn btn-primary btn-block py-2 mr-1">Book
                                now</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
@empty
<div class="row text-center">
    <h4>no data avaliable</h4>
</div>
@endforelse
@include('component.daftar-mobil')
@include('component.footer')
@endsection
