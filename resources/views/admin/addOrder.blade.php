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
                        <form action="{{ route('createpesanan') }}" method="post" id="formOrder">
                            @csrf
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap tableProduct" cellspacing="0" width="100%">
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


                                    @foreach ($products as $data)
                                    <tr>
                                        <td><input type="checkbox" name="select_product[{{ $data->id }}]" value="{{ $data->id }}" class="form-control product"></td>
                                        <td>{{ $data->barcode }}</td>
                                        <td>{{ $data->product_name }}</td>
                                        <td><img src="{{ asset($data->image) }} " alt="gambar absen" srcset="" height="50"></td>
                                        <td>{{ $data->weight }}</td>
                                        <td><input type="hidden" name="price_product[{{ $data->id }}]" value="{{ $data->price_onpieces }}">{{ $data->price_onpieces }}</td>
                                        <td>
                                            <input class="form-control quantity" style="border-color: green;" type="text" name="quantity_product[{{ $data->id }}]">
                                        </td>
                                    </tr>
                                    @endforeach




                                </tbody>
                            </table>
                            <button id="validateBtn" type="submit" class="btn btn-primary">Simpan Pesanan</button>
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
        document.getElementById('formOrder').addEventListener('submit', function(event) {
            let isValid = true;
            let isAnyCheckboxChecked = false;

            // Iterate over each row
            $('.tableProduct tbody tr').each(function() {
                // Get checkbox and quantity input of the current row
                let checkbox = $(this).find('.product');
                let quantityInput = $(this).find('.quantity');

                // Check if checkbox is checked
                if (checkbox.is(':checked')) {
                    isAnyCheckboxChecked = true;
                    // Check if quantity input is empty
                    if (quantityInput.val().trim() === '') {
                        isValid = false;
                        alert('Mohon masukan jumlah produk terpilih!');
                        event.preventDefault(); // Prevent form submission
                        return false; // Exit the loop
                    }
                }
            });

            if (!isAnyCheckboxChecked) {
                alert('Mohon pilih produk yang akan dipesan!');
                event.preventDefault(); // Prevent form submission
                return false; // Exit the loop
            } else if (isValid) {
                return true;
            }
        });
    });
</script>
@section('script')
@endsection