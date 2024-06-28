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
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tambah Users</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{route('updateusers')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <input type="hidden" name="id_users" value="{{$dataUsers->id}}">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Lengkap</label>
                                            <input type="text" name="fullname" class="form-control" id="" value="{{ $dataUsers->fullname }}" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">No. HP</label>
                                            <input type="number" name="phone" class="form-control" id="" value="{{$dataUsers->phone}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Role</label>
                                            <select name="role" id="" class="form-control">
                                                <option value="0">== Pilih Role Users ==</option>
                                                <option value="1" @if ($dataUsers->level == 1) selected @endif >Super Admin</option>
                                                <option value="2" @if ($dataUsers->level == 2) selected @endif >Sales TO</option>
                                                <option value="3" @if ($dataUsers->level == 3) selected @endif >Sales Merch</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-sm-12">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" name="username" id="" class="form-control" value="{{$dataUsers->username}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" name="email" id="" class="form-control" value="{{$dataUsers->email}}" required>
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        

                                    </div>

                                    
                                </div>
                                <div class="row">
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
<script>
    @if(Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ Session::get('error') }}',
        });
    @endif

    @if(Session::has('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ Session::get('success') }}',
        });
    @endif
</script>
@endsection
