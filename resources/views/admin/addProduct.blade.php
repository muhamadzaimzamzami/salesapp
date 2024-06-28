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
                            <h3 class="panel-title">Tambah Produk</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{route('createproduct')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Produk</label>
                                            <input type="text" name="product_name" class="form-control" id="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Barcode</label>
                                            <input type="number" name="barcode" class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Berat Bersih(gram)</label>
                                            <input type="number" name="weight" class="form-control" id="">
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-sm-12">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Harga(pcs)</label>
                                            <input type="number" name="price_pcs" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Stok(pcs)</label>
                                            <input type="number" name="stock" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Foto Produk</label>
                                            <input type="file" name="image" id="" class="form-control">
                                        </div>
                                        

                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
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
