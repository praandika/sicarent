<div class="modal fade" id="daftarMobil">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Daftar Mobil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatb">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Plat Nomor</th>
                                <th>Brand</th>
                                <th>Mobil</th>
                                <th>Transmisi</th>
                                <th>Kilometer</th>
                                <th>Tahun Rakit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                        @forelse($data as $o)
                            <tr class="klik" 
                            data-carId="{{ $o->id }}"
                            data-carName="{{ $o->car_name }}"
                            data-plate="{{ $o->plate_number }}"
                            data-transmition="{{ $o->transmition }}"
                            data-tahun="{{ $o->car_year }}">
                                <td> {{ $no++ }} </td>
                                <td> {{ $o->plate_number }} </td>
                                <td> {{ $o->car_brand }} </td>
                                <td> {{ $o->car_name }} </td>
                                <td> {{ $o->transmition == "AT"?"Automatic":"Manual" }} </td>
                                <td> {{ $o->kilometers }} </td>
                                <td> {{ $o->car_year }} </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">no data available</td>
                            </tr>
                        @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Plat Nomor</th>
                                <th>Brand</th>
                                <th>Mobil</th>
                                <th>Transmisi</th>
                                <th>Kilometer</th>
                                <th>Tahun Rakit</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('after-script')
<script>
    $(function () {
        $("#datatb").DataTable();
    });

    //passing data ke input text
    $(document).on('click', '.klik', function (e) {
        document.getElementById("car_id").value = $(this).attr('data-carId');
        document.getElementById("car_name").value = $(this).attr('data-carName');
        document.getElementById("plate").value = $(this).attr('data-plate');
        document.getElementById("transmition").value = $(this).attr('data-transmition');
        document.getElementById("tahun").value = $(this).attr('data-tahun');
        $('#daftarMobil').modal('hide');
    });
</script>
@endpush
