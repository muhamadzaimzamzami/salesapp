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
                            <h3 class="panel-title">Tabel Penjualan</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('createpesanan') }}" method="post">
                                @csrf
                                <table id="datatable-responsive"
                                    class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Barcode</th>
                                            <th>Nama Produk</th>
                                            <th>Gambar</th>
                                            <th>Kemasan</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                       
                                        @foreach ($products as $data)
                                            <tr>
                                                <td><input type="checkbox" name="select_product[{{ $data->id }}]"
                                                        value="{{ $data->id }}" class="form-control"></td>
                                                <td>{{ $data->barcode }}</td>
                                                <td>{{ $data->product_name }}</td>
                                                <td></td>
                                                <td>{{ $data->weight }}</td>
                                                <td><input type="hidden" name="price_product[{{ $data->id }}]"
                                                        value="{{ $data->price_onpieces }}">{{ $data->price_onpieces }}</td>
                                                <td>
                                                    <input id="demo3" type="text" value=""
                                                        name="quantity_product[{{ $data->id }}]">
                                                </td>
                                            </tr>
                                        @endforeach




                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Simpan Pesanan</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>


        </div> <!-- container -->

    </div>
@endsection

@section('script')
@endsection
