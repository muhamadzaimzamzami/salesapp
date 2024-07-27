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
                        <form action="{{route('updatepenjualan')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <input type="hidden" name="id_penjualan" value="{{$dataPenjualan->id}}">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Produk</label>
                                        <select name="product" class="form-control" id="" readonly>
                                            @foreach ($productStore as $product)
                                            <option @if ($product->id == $dataPenjualan->id_product) selected @endif value="{{ $product->id }}"> {{ $product->product_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="jumlah_lama" class="form-control" id="" placeholder="Jumlah Barang" value="{{ $dataPenjualan->quantity }}" required>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Jumlah</label>
                                        <input type="number" name="jumlah_barang" class="form-control" id="" placeholder="Jumlah Barang" value="{{ $dataPenjualan->quantity }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Total Harga</label>
                                        <input type="number" name="total" class="form-control" id="" placeholder="Total Harga" value="{{$dataPenjualan->total_price}}">
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Keterangan</label>
                                        <textarea name="description" class="form-control" id="" cols="30" rows="9">{{$dataPenjualan->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bukti Penjualan</label>
                                        <br>
                                        <img src="{{asset($dataPenjualan->image)}}" height="80" alt="" srcset="">
                                        <input type="hidden" name="bukti_old" id="" class="form-control" value="{{$dataPenjualan->image}}">
                                        <input type="file" name="bukti" id="" class="form-control">
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