<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <style>
        tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        table {
            border-collapse: collapse;
        }

        th {
            border-top: 1px solid #f5f5f5;
            border-bottom: 1px solid #f5f5f5;
        }

        td {
            border-bottom: 1px solid #f5f5f5;
        }

        table tr td,
        table tr th {
            padding: 10px;
            text-align: left;
        }

    </style>
</head>

<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <center>
                        <h2>Laporan Mobil</h2>
                    </center>
                    <p class="tgl">
                        printed on : {{ $printDate }}
                    </p>
                    <table id="datatb" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mobil</th>
                                <th>Brand</th>
                                <th>Transmisi</th>
                                <th>Kilometer</th>
                                <th>Tipe</th>
                                <th>Volume</th>
                                <th>Kapasitas</th>
                                <th>Bahan Bakar</th>
                                <th>Harga</th>
                                <th>Nopol</th>
                                <th>Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @forelse($data as $o)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td> {{ $o->car_name }} </td>
                                <td> {{ $o->car_brand }} </td>
                                <td> {{ $o->transmition  }} </td>
                                <td> {{ $o->kilometers  }} KM</td>
                                <td> {{ $o->car_type }} </td>
                                <td> {{ $o->engine_vol }} </td>
                                <td> {{ $o->car_capacity }} </td>
                                <td> {{ $o->fuel }} </td>
                                <td> Rp {{ number_format($o->price, 0, ',', '.') }} </td>
                                <td> {{ $o->plate_number }} </td>
                                <td> {{ $o->car_year }} </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="13" class="text-center">no data available</td>
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
