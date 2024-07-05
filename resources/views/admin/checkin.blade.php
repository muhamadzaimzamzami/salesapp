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
                        <h4 class="pull-left page-title">Lobi</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">Lobi</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Checkin Status</h3>
                        </div>
                        <div class="panel-body">
                            <div class="">

                                <div class="row">

                                    <div class="col-xs-6 col-sm-6 m-t-30 col-lg-12">
                                        <form action="{{ route('checkin') }}" method="post" id="formCheck"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Pilih Toko</label>
                                                    <select name="toko" id="tokoSelect" class="form-control">
                                                        <option value="0">---- Pilih Toko ----</option>
                                                        @foreach ($toko as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Unggah Foto</label>
                                                    <input onchange="return validasiEkstensi()" type="file" class="form-control" name="photo"
                                                        id="photo">
                                                </div>

                                                <div id="preview"></div>
                                            </div>
                                            <button type="button" class="btn btn-default waves-effect"
                                                data-dismiss="modal">Cancel</button>
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light">CheckIn</button>

                                        </form>
                                    </div>

                                </div> <!-- end row -->
                            </div>


                        </div>
                    </div>
                </div>
            </div>



        </div> <!-- container -->

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('formCheck').addEventListener('submit', function(event) {
                var toko = document.getElementById("tokoSelect").value;
                var photo = document.getElementById("photo").value;


                if (toko !== "0" && photo !== "") {
                    return true; // Form will be submitted
                } else {
                    alert('Anda harus mengisi data dengan lengkap!');
                    event.preventDefault(); // Prevent form submission
                    return false; // Form is not valid
                }
            });
        });
        function validasiEkstensi() {
            var inputFile = document.getElementById('photo');
            var pathFile = inputFile.value;
            var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
            if (!ekstensiOk.exec(pathFile)) {
                alert('Silakan upload file yang dengan ekstensi .jpeg/.jpg/.png');
                inputFile.value = '';
                return false;
            } else {
                // Preview gambar
                if (inputFile.files && inputFile.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('preview').innerHTML = '<img src="' + e.target.result +
                            '" style="height:100px"/>';
                    };
                    reader.readAsDataURL(inputFile.files[0]);
                }
            }
        }
    </script>
@endsection

@section('script')
@endsection
