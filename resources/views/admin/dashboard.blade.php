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
                            <h3 class=""><b>2568</b></h3>
                            <p class="text-muted"><b>48%</b> From Last 24 Hours</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Pesanan</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>3685</b></h3>
                            <p class="text-muted"><b>15%</b> Orders in Last 10 months</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Penjualan</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>25487</b></h3>
                            <p class="text-muted"><b>65%</b> From Last 24 Hours</p>
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
                                        <th>Toko</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Toko A</td>
                                        <td>Aqua</td>
                                        <td>3</td>
                                        <td>Lunas</td>
                                    </tr>
                                    <tr>
                                        <td>Toko A</td>
                                        <td>Aqua</td>
                                        <td>3</td>
                                        <td>Lunas</td>
                                    </tr>
                                    <tr>
                                        <td>Toko A</td>
                                        <td>Aqua</td>
                                        <td>3</td>
                                        <td>Lunas</td>
                                    </tr>
                                    <tr>
                                        <td>Toko A</td>
                                        <td>Aqua</td>
                                        <td>3</td>
                                        <td>Lunas</td>
                                    </tr>
                                    <tr>
                                        <td>Toko A</td>
                                        <td>Aqua</td>
                                        <td>3</td>
                                        <td>Lunas</td>
                                    </tr>
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
