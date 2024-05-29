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
                        <h4 class="pull-left page-title">Pesanan</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">Pesanan</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tabel Pesanan</h3>
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

            </div>

        </div> <!-- container -->

    </div>
@endsection

@section('script')
@endsection
