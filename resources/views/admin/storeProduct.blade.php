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
                            <h3 class="panel-title">Tabel Produk {{ session('name_store') }} </h3>
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
                                            <td><img src="{{ asset($data->image)}}" alt="gambar product" srcset=""></td>
                                            <td>{{ $data->weight }}</td>
                                            <td>{{ $data->stock }}</td>
                                            <td>{{ $data->price_onpieces }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning waves-effect waves-light"
                                                    data-toggle="modal" data-target="#myModal_{{$data->id}}"><span
                                                        class="mdi mdi-pencil"></span></button>
                                                <!-- sample modal content -->
                                                <div id="myModal_{{$data->id}}" class="modal fade" tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Update Stok</h4>
                                                            </div>
                                                            <form action="{{route('updatestok')}}" method="post">
                                                            @csrf
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label for="">Stok Produk</label>
                                                                        <input type="hidden" name="id_product" value="{{$data->id}}">
                                                                        <input type="text" name="stock_product" class="form-control" value="{{$data->stock}}">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-default waves-effect"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary waves-effect waves-light">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
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
