@extends('layouts.main')
@section('title','Calendar')
@push('before-css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
@endpush

@push('after-css')
<style>
    .fc-title {
        color: #fff !important;
    }

</style>
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div id="calendar"></div>
    </div>
</div>
@endsection

@push('after-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function () {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events: [
                @foreach($calendar as $o) {
                    title: '{{ $o->name }} - {{ $o->car_name }}',
                    start: '{{ $o->booking_date }}',
                    end: '{{ $o->return_date }}',
                },
                @endforeach
            ]
        })
    });

</script>
@endpush
