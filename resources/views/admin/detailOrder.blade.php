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
                </div
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Detail Pesanan {{ $detailOrder->id }}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Toko</label>
                                        <input type="text" class="form-control" readonly value={{ $detailOrder->name }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Np HP</label>
                                        <input type="number" class="form-control" id="" readonly value={{ $detailOrder->phone }}>
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pemilik Toko</label>
                                        <input type="text" name="owner" id="" class="form-control" readonly value={{ $detailOrder->owner }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alamat Toko</label>
                                        <textarea name="address" class="form-control" id="" cols="30" rows="">{{ $detailOrder->address }}</textarea>
                                    </div>
                                    

                                </div>

                                

                                <div class="col-md-6 col-sm-12">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal Order</label>
                                        <input type="datetime" class="form-control" readonly value={{ $detailOrder->created_at }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sales</label>
                                        <input type="text" class="form-control" id="" readonly value={{ $detailOrder->fullname }}>
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Total Harga</label>
                                        <input type="text" name="owner" id="" class="form-control" readonly value={{ $detailOrder->total_price }}>
                                    </div>
                                    @if ($detailOrder->status == 2)
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"></label>
                                            <input type="text" name="owner" id="" class="form-control" style="color:green;" readonly value="SELESAI">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"></label>
                                            <input type="text" name="owner" id="" class="form-control" style="color:red;" readonly value="Menunggu Konfirmasi">
                                        </div>
                                    @endif
                                    
                                    
                                    

                                </div>
                            </div>
                            <div class="row">
                                <hr>
                                <h4>Detail Product</h4>
                                <table id="" class="table table-striped table-bordered dt-responsive nowrap"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Barcode</th>
                                            <th>Nama Produk</th>
                                            <th>Gambar</th>
                                            <th>Kemasan</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($detailProduct as $data)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $data->barcode }}</td>
                                                <td>{{ $data->product_name }}</td>
                                                <td> <img src="{{ asset($data->image)}}" width="100px" alt="gambar product" srcset=""></td>
                                                <td>{{ $data->weight }}</td>
                                                <td>{{ $data->price_onpieces }}</td>
                                                <td>{{ $data->quantity }}</td>
                                                {{-- <td>
                                            <a href="" class="btn btn-warning"><span class="mdi mdi-lead-pencil"></span></a>
                                            <a href="" class="btn btn-danger"><span class="mdi mdi-delete"></span></a>
                                        </td> --}}
                                            </tr>
                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <form action="{{ route('selesaikanorder') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id_order" value={{ $detailOrder->id }}>
                                    <input type="hidden" name="id_store" value={{ $detailOrder->id_store }}>
                                    @if ($detailOrder->status == 1 && session('role') == 1)
                                        <button type="submit" class="btn btn-success">Selesaikan</button>
                                    @endif
                                    
                                </form>
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
