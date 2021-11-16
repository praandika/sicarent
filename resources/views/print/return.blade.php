<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invoice }}</title>
    <style>
        body {
            font-family: 'Calibri', 'sans-serif';
        }

        .row,
        .col-lg-12 {
            width: 100%;
        }

        .col-lg-6 {
            width: 50%;
        }

        .table {
            padding: 8px;
        }

        .table-striped tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #F1E9E5;
        }

        .invoice {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .invoice td,
        .invoice th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .invoice tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .invoice tr:hover {
            background-color: #ddd;
        }

        .invoice th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #0F52BA;
            color: white;
        }

    </style>
</head>

<body>
    <div class="row">
        <div class="col-lg-12">
            <h3>
                <strong>
                   Putra Bali Car Rental
                </strong>
            </h3>
            <p>
                Jalan Kebudayaan III Gg Punggawa II No.20, Sidakarya, Denpasar Selatan, Kota Denpasar, Bali 80224
            </p>
            <p>
            +62 819-1613-9408

            </p>
        </div>
        <hr>
    </div>
    @foreach($data as $o)
    <table class="table table-striped">
        <tr>
            <th>To</th>
            <th>Invoice</th>
            <th>Date</th>
            <th>Payment Status</th>
        </tr>
        <tr>
            <td>
                {{ $o->booking->user->name }} <br>
                {{ $o->booking->user->address }} <br>
                Phone : {{ $o->booking->user->phone }} <br>
                Email : {{ $o->booking->user->email }}
            </td>
            <td>
                {{ $o->invoice }}
            </td>
            <td>
                {{ Carbon\Carbon::parse($o->payment_date)->format('d-m-Y') }}
            </td>
            <td style="text-align: right"><h1><strong>{{ strtoUpper($o->booking_status) }}</strong></h1></td>
        </tr>
    </table>
    <table class="invoice">
        <tr>
            <th>Mobil</th>
            <th>Duration</th>
            <th>Overtime</th>
        </tr>
        <tr>
            <td>{{ $o->booking->car->car_name }}</td>
            <td>{{ $duration }} day(s)</td>
            <td>{{ $overtime }} day(s)</td>
        </tr>
        <tr>
            <td colspan="1"></td>
            <td>Fines</td>
            <th>Rp {{ number_format($fines, 0, ',', '.') }}</th>
        </tr>
    </table>
    @endforeach
</body>

</html>
