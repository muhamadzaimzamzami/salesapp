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
                            <form action="{{route('createusers')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Lengkap</label>
                                            <input type="text" name="fullname" class="form-control" id="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">No. HP</label>
                                            <input type="number" name="phone" class="form-control" id="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Role</label>
                                            <select name="role" id="" class="form-control">
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
                                            <input type="text" name="username" id="" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" name="email" id="" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password</label>
                                            <input type="text" name="password" id="" class="form-control" required>
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
