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
                        <h4 class="pull-left page-title">User Management</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">User Management</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tabel Users</h3>
                        </div>
                        <div class="panel-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <a href="/tambah-users" class="btn btn-success">Tambah Users</a><br><br>
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Level</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($users as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->fullname }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->phone }}</td>
                                            <td>
                                                @if ($data->level == 1)
                                                    {{ 'Super Admin' }}
                                                @else
                                                    {{ 'Sales' }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('editusers', ['id' => $data->id]) }}" class="btn btn-warning"><span
                                                        class="mdi mdi-lead-pencil"></span></a>
                                                <a href="{{ route('deleteusers', ['id' => $data->id]) }}" class="btn btn-danger"><span
                                                        class="mdi mdi-delete"></span></a>
                                                <a href="{{ route('resetpassword', ['id' => $data->id]) }}" class="btn btn-default"><span
                                                        class="mdi mdi-key"></span></a>
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
