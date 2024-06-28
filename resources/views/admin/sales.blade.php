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
                        <h4 class="pull-left page-title">Penjualan</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">Penjualan</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tabel Penjualan</h3>
                        </div>
                        <div class="panel-body">
                            @if(session('status') == 1 )
                            <div class="row">
                                <a href="/tambah-penjualan" class="btn btn-success">Tambah Penjualan</a>
                            </div>
                            @else 
                            <div class="row">
                                <i>Jika anda ingin menambahkan penjualan silahkan checkin ke toko terlebih dahulu!</i>
                            </div>
                            @endif
                            <br>
                            <div class="row">
                                <table id="datatable-responsive"
                                    class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>Toko</th>
                                            @if (session('role')==1)
                                            <th>Nama Sales</th>
                                            @endif
                                            <th>Produk</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Bukti</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sales as $data)
                                        <tr>
                                            <td>{{ $data->name }}</td>
                                            @if (session('role')==1)
                                            <td>{{ $data->fullname }}</td>
                                            @endif
                                            <td>{{ $data->product_name }}</td>
                                            <td>{{ $data->quantity }}</td>
                                            <td>{{ $data->total_price }}</td>
                                            <td>
                                                <img src="{{ $data->image }}" alt="{{ $data->product_name }}" width="100">
                                            </td>
                                            <td>

                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        
                                        
                                    </tbody>
                                </table>

                            </div>


                        </div>
                    </div>
                </div>

            </div>


        </div> <!-- container -->

    </div>
@endsection

@section('script')
@endsection
