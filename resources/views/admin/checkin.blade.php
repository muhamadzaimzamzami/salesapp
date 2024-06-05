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

                                    <div class="col-xs-6 col-sm-6 m-t-30 col-lg-6">
                                        <form action="{{ route('checkin') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pilih Toko</label>
                                                <select name="toko" id="" class="form-control">
                                                    <option value="">---- Pilih Toko ----</option>
                                                    @foreach ($toko as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <input type="button" class="btn btn-sm btn-primary" id="open_camera"
                                                    value ="Open Camera"><br />
                                                <div id="my_camera" class="d-none"></div>
                                                <br />
                                                <input type="button" id="take_snap" value="Take Snapshot"
                                                    onClick="take_snapshot()" class="d-none btn btn-info btn-sm">
                                                <input type="hidden" name="image" class="image-tag">
                                            </div>
                                            <div class="col-md-6">
                                                <div id="results"></div>
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
        $("#open_camera").click(function() {
            $("#my_camera").removeClass('d-none');
            $("#take_snap").removeClass('d-none');

            Webcam.set({
                width: 250,
                height: 190,
                image_format: 'jpeg',
                jpeg_quality: 90
            });
            Webcam.attach('#my_camera');
        });

        function take_snapshot() {
            $("#my_camera").addClass('d-none');
            $("#take_snap").addClass('d-none');
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>
@endsection

@section('script')
    
@endsection
