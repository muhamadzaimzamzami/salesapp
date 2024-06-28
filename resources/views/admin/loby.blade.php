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
                                @if (session('status') == 1)
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 m-t-30 col-lg-12">
                                            <div class=" text-center">
                                                <p class="text-muted">Anda Sudah Chekin di toko {{ session('name_store') }}
                                                </p>
                                                <form action="{{ route('checkout') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id_check" value="{{ session('id_absent') }}">

                                                    <button type="submit"
                                                        class="btn btn-danger waves-effect waves-light">CheckOut</button>
                                                </form>
                                            </div>


                                        </div>

                                    </div> <!-- end row -->
                                @else
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 m-t-30 col-lg-12">
                                            <div class=" text-center">
                                                <p class="text-muted">Silahkan check in menggunakan tombol di bawah ini!</p>
                                                <a href="/checkin-page"type="button"
                                                    class="btn btn-primary waves-effect waves-light">Checkin</a>
                                            </div>

                                        </div>

                                    </div> <!-- end row -->
                                @endif

                            </div>


                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tabel Absensi</h3>
                        </div>
                        <div class="panel-body">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Toko</th>
                                        @if (session('role')==1)
                                            <th>Nama Sales</th>
                                        @endif
                                        <th>Status</th>
                                        <th>Waktu Checkin</th>
                                        <th>Waktu Checkout</th>
                                        <th>Foto</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($absensi as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->name }}</td>
                                            @if (session('role')==1)
                                            <td>{{ $data->fullname }}</td>
                                            @endif
                                            <td>
                                                @if ($data->status == 1)
                                                    <div class="btn btn-success">Checkin</div>
                                                @else
                                                    <div class="btn btn-danger">Checkout</div>
                                                @endif
                                            </td>
                                            <td>{{ $data->created_at }}</td>
                                            <td>{{ $data->updated_at }}</td>
                                            <td></td>
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
