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
                        <h4 class="pull-left page-title">Dashboard</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">Dashboard</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Total Toko</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{ $totalToko }}</b></h3>
                            {{-- <p class="text-muted"><b>48%</b> From Last 24 Hours</p> --}}
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Total Produk</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{ $totalProduk }}</b></h3>
                            {{-- <p class="text-muted"><b>15%</b> Orders in Last 10 months</p> --}}
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Penjualan</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{$totalPenjualan}}</b></h3>
                            {{-- <p class="text-muted"><b>65%</b> From Last 24 Hours</p> --}}
                        </div>
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
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Toko</th>
                                        <th>SPG</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataPesanan as $dp)
                                        <tr>
                                            <td>{{ $dp->created_at}}</td>
                                            <td>{{ $dp->name}}</td>
                                            <td>{{ $dp->fullname}}</td>
                                            <td>{{ $dp->total_price}}</td>
                                            <td>
                                                @if ($dp->status == 1)
                                                    <span class="btn btn-warning">Diproses</span>
                                                @else
                                                    <span class="btn btn-success">Selesai</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div> <!-- End Row -->


        </div> <!-- container -->

    </div>
@endsection

@section('script')
@endsection
