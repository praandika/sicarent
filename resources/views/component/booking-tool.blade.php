<section class="ftco-section ftco-no-pt bg-light" id="search">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-12	featured-top">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex align-items-center">
                        <form action="{{ route('booking') }}" method="get" class="request-form ftco-animate bg-primary">
                            @csrf
                            <h2>Booking form</h2>
                            <div class="form-group">
                                <label for="transmition" class="label">Transmition</label>
                                <select name="transmition" id="transmition" class="form-control">
                                    <option value="AT" style="color: black;">Automatic</option>
                                    <option value="MT" style="color: black;">Manual</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="capacity" class="label">Capacity</label>
                                <select name="capacity" id="capacity" class="form-control">
                                @foreach($data as $o)
                                    <option value="{{ $o->car_capacity }}" style="color: black;">{{ $o->car_capacity }} Seats</option>
                                @endforeach
                                </select>
                            </div>
                        
                            <div class="form-group">
                                <input type="submit" value="Find my Car" class="btn btn-secondary py-3 px-4">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8 d-flex align-items-center">
                        <div class="services-wrap rounded-right w-100">
                            <h3 class="heading-section mb-4">Better Way to Rent Your Perfect Cars</h3>
                            <div class="row d-flex mb-4">
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span
                                                class="flaticon-car"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Choose Your Car</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span
                                                class="flaticon-handshake"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Select the Best Deal</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span
                                                class="flaticon-rent"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Reserve Your Rental Car</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p><a href="#carlist" class="btn btn-primary py-3 px-4">Look Up Your Favorite Car</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
