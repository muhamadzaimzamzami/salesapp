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
                        <h4 class="pull-left page-title">Pesanan</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">Pesanan</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tabel Pesanan </h3>
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
                            @if (session('status') == 1)
                                <div class="row">
                                    <a href="/tambah-pesanan" class="btn btn-success">Tambah Pesanan</a>
                                </div>
                            @else
                                <div class="row">
                                    <i>Jika anda ingin menambahkan pesanan silahkan checkin ke toko terlebih dahulu!</i>
                                </div>
                            @endif
                            <br>
                            <div class="row">
                                <table id="datatable-responsive"
                                    class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            @if (session('status') != 1)
                                                <th>
                                                    Toko
                                                </th>
                                            @endif
                                            <th>Total Harga</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $data)
                                        <tr>
                                            <td>{{ $data->created_at }}</td>
                                            @if (session('status')!=1)
                                                <td>{{ $data->name }}</td>
                                            @endif
                                            <td>{{ $data->total_price }}</td>
                                            <td>{{ $data->description }}</td>
                                            <td>
                                                @if ($data->status == 1)
                                                    <span class="btn btn-warning">Diproses</span>
                                                @else
                                                    <span class="btn btn-success">Selesai</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/detail-pesanan/{{$data->id}}" class="btn btn-primary"><span class="mdi mdi-eye"></span></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>

            </div>

        </div> <!-- container -->

    </div>
@endsection

@section('script')
@endsection
