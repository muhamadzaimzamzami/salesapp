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
                        <h4 class="pull-left page-title">Laporan</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">Laporan</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Laporan</h3>
                        </div>
                        <div class="panel-body">
                            
                            <div class="row">
                                @if ($query->isNotEmpty())
                                <a href="{{ route('getexcel', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="btn btn-success">Export to Excel</a>
                                    <br><br>    
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                    cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>SPG</th>
                                                <th>Toko</th>
                                                @foreach ($query->first() as $key => $value)
                                                    @if (!in_array($key, ['spg', 'toko']))
                                                        <th>{{ $key }}</th>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($query as $row)
                                                <tr>
                                                    <td>{{ $row->spg }}</td>
                                                    <td>{{ $row->toko }}</td>
                                                    @foreach ($row as $key => $value)
                                                        @if (!in_array($key, ['spg', 'toko']))
                                                            <td>{{ $value }}</td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>No data available for the selected date range.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Row -->


        </div> <!-- container -->

    </div>
@endsection

@section('script')
@endsection
