@extends('layouts.landing-app')
@section('landing-content')

@include('component.navigation')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset("images/bg_1.jpg") }}');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="{{ route('landing.page') }}">Home <i
                                class="ion-ios-arrow-forward"></i></a></span>

                    <span class="mr-2"><a href="{{ url()->previous() }}">Choose <i
                                class="ion-ios-arrow-forward"></i></a></span>
                    <span>Booking <i class="ion-ios-arrow-forward"></i></span>
                </p>
                <h1 class="mb-3 bread">Booking</h1>
            </div>
        </div>
    </div>
</section>

<!-- Booking Form -->
<section class="ftco-section bg-light">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('savebook') }}" method="post">
                    @csrf
                    @foreach($data as $o)
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="hidden" value="{{ $o->car_capacity }}" name="capacity">
                            <input type="hidden" value="{{ $o->transmition }}" name="transmition">
                            <img src="{{ asset('images/car/'.$o->image) }}" style="width: 500px;" class="mb-3">

                        </div>
                        <div class="col-lg-6">
                            <table>
                                <tr colspan="2">
                                    <h3>{{ $o->car_brand }} {{ $o->car_name }}</h3>
                                </tr>
                                <tr>
                                    <td>Capacity</td>
                                    <td>: {{ $o->car_capacity }}</td>
                                </tr>
                                <tr>
                                    <td>Transmition</td>
                                    <td>: {{ $o->transmition == "AT" ? "Automatic" : "Manual" }}</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>: {{ $o->car_type }}</td>
                                </tr>
                                <tr>
                                    <td>Volume</td>
                                    <td>: {{ $o->engine_vol }}</td>
                                </tr>
                                <tr>
                                    <td>Plate Number</td>
                                    <td>: {{ $o->plate_number }}</td>
                                </tr>
                                <tr>
                                    <td>Car Year</td>
                                    <td>: {{ $o->car_year }}</td>
                                </tr>
                                <tr>
                                    <td>Fuel</td>
                                    <td>: {{ $o->fuel }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h3><strong>Pick your date</strong></h3>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>01</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>01</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>02</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>03</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>04</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>05</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>06</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>07</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>08</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>09</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>10</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>11</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>12</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>13</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>14</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>15</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>16</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>17</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>18</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>19</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>20</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>21</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>22</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>23</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>24</strong></h4>
                            </div>
                        </div>
                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>25</strong></h4>
                            </div>
                        </div><div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>26</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>27</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>28</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>29</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>30</strong></h4>
                            </div>
                        </div>

                        <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">{{ $month }}</p>
                                <h4 class="text-white"><strong>31</strong></h4>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@include('component.footer')
@endsection
