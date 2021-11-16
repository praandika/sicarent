<table>
    <thead>
        <tr>
            <th>Invoice</th>
            <th>Payment Date</th>
            <th>User</th>
            <th>Mobil</th>
            <th>Total</th>
            <th>Overtime</th>
            <th>Fines</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $o)
            <tr>
                <td> {{ $o->invoice }} </td>
                <td> {{ $o->payment_date }} </td>
                <td> {{ $o->booking->user->name }} </td>
                <td> {{ $o->booking->car->car_name }} </td>
                <td> Rp {{ number_format($o->total, 0, ',', '.') }} </td>
                <td> {{ $o->overtime }} day(s)</td>
                <td> Rp {{ number_format($o->fines, 0, ',', '.') }} </td>
                <td> {{ $o->payment_status }} </td>
            </tr>
        @endforeach
    </tbody>
</table>