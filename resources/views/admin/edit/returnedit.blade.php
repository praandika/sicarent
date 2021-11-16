@extends('layouts.main')
@section('title','Pengembalian Mobil')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pengembalian Mobil</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @foreach($data as $o)
                <form action="{{ route('return.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $o->id }}">
                    <div class="row">
                        <img src="{{ asset('images/car/'.$o->booking->car->image) }}">
                        <div class="col-lg-12">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Invoice -->
                            <div class="form-group">
                                <label for="invoice">Invoice</label>
                                <input type="text" class="form-control" id="invoice" name="invoice"
                                    value="{{ $o->invoice }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Mobil -->
                            <div class="form-group">
                                <label for="car">Mobil</label>
                                <input type="text" id="car" class="form-control" name="car_name"
                                    value="{{ $o->booking->car->car_name }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <!-- Booking Date -->
                            <div class="form-group">
                                <label for="start">Booking Date</label>
                                <input type="text" id="start" class="form-control" name="start"
                                    value="{{ $o->booking_date }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Return Date -->
                            <div class="form-group">
                                <label for="end">Return Date</label>
                                <input type="text" id="end" class="form-control" name="end"
                                    value="{{ $o->return_date }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Return Date -->
                            <div class="form-group">
                                <label for="return">Confirm Return Date</label>
                                <input type="date" id="return" class="form-control" name="return"
                                    value="{{ old('return') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <!-- Fines -->
                            <h2>Duration</h2>
                            <h2><span id="duration"></span> day(s)</h2>
                            <input type="hidden" id="durationInput" name="duration" required>
                        </div>
                        <div class="col-lg-4">
                            <h2>Overtimes</h2>
                            <h2><span id="over"></span> day(s)</h2>
                            <input type="hidden" id="overInput" name="overtime" required>
                        </div>
                        <div class="col-lg-4">
                            <h2>Fines</h2>
                            <strong>
                                <h2 style="color: red;"><span id="fines"></span></h2>
                            </strong>
                            <input type="hidden" id="finesInput" name="fines" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@push('after-script')
<script>
    $(document).ready(function () {
        $('body').on('change', '#return', function () {
            let start = moment($('#start').val()).format('YYYYMDD');
            let end = moment($('#end').val()).format('YYYYMDD');
            let retrn = moment($('#return').val()).format('YYYYMDD');
            let duration = end - start;
            let over = retrn - end;
            let fines = over * 20000;
            $('#duration').text(duration);
            $('#durationInput').val(duration);
            $('#over').text(over);
            $('#overInput').val(over);
            $('#fines').text(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(fines));
            $('#finesInput').val(fines);
        });
    });

</script>
@endpush
