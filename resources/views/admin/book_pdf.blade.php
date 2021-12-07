<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <style>
        tr:nth-child(even){
            background-color: #f5f5f5;
        }

        table{
            border-collapse: collapse;
        }

        th{
            border-top: 1px solid #f5f5f5;
            border-bottom: 1px solid #f5f5f5;
		}

        td{
            border-bottom: 1px solid #f5f5f5;
		}

        table tr td,
        table tr th{
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <center>
                        <h2>Laporan Sewa</h2>
                    </center>
                    <p class="tgl">
                        printed on : {{ $printDate }}
                    </p>
                    <table id="datatb" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Mobil</th>
                                <th>Booking Date</th>
                                <th>Return Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @forelse($data as $o)
                            <tr>
                                <td> {{ $no++  }} </td>
                                <td> {{ $o->book_code }} </td>
                                <td> {{ $o->car_name }} </td>
                                <td> {{ Carbon\Carbon::parse($o->booking_date)->format('D d M Y') }} </td>
                                <td> {{ Carbon\Carbon::parse($o->return_date)->format('D d M Y') }} </td>
                                <td> {{ $o->booking_status  }} </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">no data available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
