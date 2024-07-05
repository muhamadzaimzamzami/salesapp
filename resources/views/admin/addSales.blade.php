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
                            <form id="formSales" action="{{ route('createpenjualan') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Produk</label>
                                            <select name="product" class="form-control" id="product">
                                                <option value="0">== Pilih Product ==</option>
                                                @foreach ($storeProduct as $product)
                                                    <option value="{{ $product->id }}"> {{ $product->product_name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Jumlah</label>
                                            <input type="number" name="jumlah_barang" class="form-control"
                                                id="jumlah_barang" placeholder="Jumlah Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Total Harga</label>
                                            <input type="number" name="total" class="form-control" id="total"
                                                placeholder="Total Harga">
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-sm-12">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Keterangan</label>
                                            <textarea name="description" class="form-control" id="description" cols="30" rows="9"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Bukti Penjualan</label>
                                            <input type="file" name="bukti" id="bukti" class="form-control">
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('formSales').addEventListener('submit', function(event) {
            var jumlahBarang = document.getElementById("jumlah_barang").value;
            var total = document.getElementById("total").value;
            var description = document.getElementById("description").value;
            var bukti = document.getElementById("bukti").value;
            var product = document.getElementById("product").value;

            if (product !== "0" && jumlahBarang !== "" && total !== "" && description !== "" && bukti !== "") {
                return true; // Form will be submitted
            } else {
                alert('Anda harus mengisi data dengan lengkap!');
                event.preventDefault(); // Prevent form submission
                return false; // Form is not valid
            }
        });
    });
</script>
@section('script')
@endsection
