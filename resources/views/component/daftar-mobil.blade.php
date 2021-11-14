<section class="ftco-section ftco-no-pt bg-light" id="carlist">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">What we offer</span>
                <h2 class="mb-2">Featured Vehicles</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel">
                    @forelse($car as $o)
                    <div class="item">
                        <form action="{{ route('setbook') }}" method="get">
                            @csrf
                            <input type="hidden" name="id" value="{{ $o->id }}">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end"
                                    style="background-image: url('{{ asset("images/car/$o->image") }}');">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0"><a href="#">{{ $o->car_name }}</a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat">{{ $o->car_brand }}</span>
                                        <p class="price ml-auto">Rp {{ number_format($o->price, 0, ',', '.') }}
                                            <span>/day</span></p>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book
                                            now</a> <a href="#" class="btn btn-secondary py-2 ml-1">Details</a></p>
                                </div>
                            </div>
                    </div>
                    </form>
                    @empty
                    <div style="margin: auto;">
                        no cars available
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
