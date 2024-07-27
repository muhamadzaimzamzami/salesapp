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
                    <h4 class="pull-left page-title">Users</h4>
                    <ol class="breadcrumb pull-right">
                        <li class="active">Users/Tambah Users</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert"> --}}
                {{ Session::get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tambah Users</h3>
                    </div>
                    <div class="panel-body">
                        <form id="formUsers" action="{{route('createusers')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Lengkap</label>
                                        <input type="text" name="fullname" class="form-control" id="fullname">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">No. HP</label>
                                        <input type="number" name="phone" class="form-control" id="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="0">== Pilih Role Users ==</option>
                                            <option value="1">Super Admin</option>
                                            <option value="2">Sales TO</option>
                                            <option value="3">Sales Merch</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" name="username" id="username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input type="text" name="password" id="password" class="form-control">
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
        document.getElementById('formUsers').addEventListener('submit', function(event) {
            var fullname = document.getElementById("fullname").value;
            var phone = document.getElementById("phone").value;
            var role = document.getElementById("role").value;
            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            if (fullname !== "" && phone !== "" && role !== "0" && username !== "" && email !== "" && password !== "") {
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