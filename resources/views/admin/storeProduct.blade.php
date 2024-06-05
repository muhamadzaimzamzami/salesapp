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
                        <h4 class="pull-left page-title">Produk</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">Produk</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tabel Produk {{session('name_store')}} </h3>
                        </div>
                        <div class="panel-body">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Barcode</th>
                                        <th>Nama Produk</th>
                                        <th>Gambar</th>
                                        <th>Kemasan</th>
                                        <th>Stock</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;   
                                    @endphp
                                    @foreach ($storeProduct as $data)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $data->barcode }}</td>
                                        <td>{{ $data->product_name }}</td>
                                        <td></td>
                                        <td>{{ $data->weight }}</td>
                                        <td>{{ $data->stock }}</td>
                                        <td>{{ $data->price_onpieces }}</td>
                                        <td>
                                            <a href="" class="btn btn-warning"><span class="mdi mdi-lead-pencil"></span></a>
                                            <a href="" class="btn btn-danger"><span class="mdi mdi-delete"></span></a>
                                        </td>
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                    @endforeach
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
