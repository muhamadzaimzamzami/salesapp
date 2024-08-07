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
                            <form id="formStore" action="{{ route('createtoko') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Toko</label>
                                            <input type="text" name="name" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">No Phone</label>
                                            <input type="number" name="phone" class="form-control" id="phone"
                                                placeholder="No Phone">
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-sm-12">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pemilik Toko</label>
                                            <input type="text" name="owner" id="owner" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Alamat Toko</label>
                                            <textarea name="address" class="form-control" id="address" cols="30" rows="9"></textarea>
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
        document.getElementById('formStore').addEventListener('submit', function(event) {
            var name = document.getElementById("name").value;
            var owner = document.getElementById("owner").value;
            var address = document.getElementById("address").value;
            var phone = document.getElementById("phone").value;

            if (name !== "" && owner !== "" && address !== "" && phone !== "") {
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
