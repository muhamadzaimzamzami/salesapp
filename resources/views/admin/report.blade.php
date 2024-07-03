@extends('../master')
@section('title')
    Sales App
@endsection

@section('content')
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Laporan</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">Laporan</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Laporan</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('getlaporan')}}" method="post">
                                    @csrf
                                    <div class="col-md-5 col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Awal</label>
                                            <input type="date" name="start_date" class="form-control" id=""
                                                required>
                                        </div>

                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <p></p>
                                        <h1 class="text-center">-</h1>

                                    </div>

                                    <div class="col-md-5 col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Akhir</label>
                                            <input type="date" name="end_date" id="" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-primary"
                                            id="tampilkanLaporan">Tampilkan</button>
                                    </div>
                                </form>
                            </div>

                            <div class="row">
                                <table id="example" style="display:none;" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>SPG</th>
                                            <th>Toko</th>

                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Row -->


        </div> <!-- container -->

    </div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).on('click', '#tampilkanLaporan', function(e) {
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();

            var data = {}
            data.startDate = startDate;
            data.endDate = endDate;

            route = "{{ route('getlaporan') }}";
            var tabel_pekerja = $("#example").DataTable();
            $.ajax({
                url: route,
                type: "POST",
                data: "datanya=" + JSON.stringify(data),
                dataType: "json",
                beforeSend: function() {

                },
                success: function(data) {
                    response = JSON.parse(JSON.stringify(data));
                    console.log(response);

                }
            })
        });
        // $(document).ready(function() {
        //     // Initialize DataTable
        //     var startDate = $('#start_date').val();
        //     var endDate = $('#end_date').val();

        //     var table = $('#example').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax: {
        //             url: '/getlaporan',
        //             type: 'POST',
        //             data: {
        //                 _token: $('meta[name="csrf-token"]').attr('content'), // Mengambil token CSRF dari meta tag
        //                 start_date: startDate, // Perbaiki penggunaan "=" menjadi ":"
        //                 end_date: endDate, // Perbaiki penggunaan "=" menjadi ":"
        //             },
        //             dataSrc: 'data' // Memperbarui dataSrc sesuai dengan struktur respons JSON
        //         },

        //         console.log(dataSrc);
        //         columns: [
        //             { data: 'spg', title: 'SPG' },
        //             { data: 'toko', title: 'Toko' }
        //             // Kolom produk dinamis akan ditambahkan di sini
        //         ],
        //         initComplete: function(settings, json) {
        //             if (json.data.length > 0) { // Perhatikan penggunaan json.data
        //                 var products = Object.keys(json.data[0]).filter(key => key !== 'spg' && key !== 'toko');
        //                 products.forEach(function(product) {
        //                     table.column.add({ data: product, title: product });
        //                 });
        //                 table.draw();
        //             }
        //         }
        //     });


        //     // Filter button click event
        //     $('#tampilkanLaporan').click(function() {
        //         table.ajax.reload();
        //     });
        // });
    </script>
    <script>
        // $(document).ready(function() {
        //     $('#tampilkanLaporan').on('click', function() {
        //         var startDate = $('#start_date').val();
        //         var endDate = $('#end_date').val();

        //         $.ajax({
        //             url: '/get-data',  // Route untuk mengambil data
        //             method: 'POST',
        //             data: {
        //                 _token: $('input[name="_token"]').val(),
        //                 start_date: startDate,
        //                 end_date: endDate
        //             },
        //             success: function(response) {
        //                 $('#example').DataTable({
        //                     data: response.data,
        //                     columns: [
        //                         { data: 'name' },
        //                         { data: 'position' },
        //                         { data: 'office' },
        //                         { data: 'age' },
        //                         { data: 'start_date' },
        //                         { data: 'salary' }
        //                     ],
        //                     destroy: true
        //                 });
        //             }
        //         });
        //     });
        // });
    </script>
@endsection
