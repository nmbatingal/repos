@extends('layouts.app')

@section('title')
R&D Investments - 
@endsection

@section('styles')
<!-- datatable -->
<link href="{{ asset('assets/node_modules/datatables/media/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
<!-- chartist CSS -->
<link href="{{ asset('assets/node_modules/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/node_modules/chartist-js/dist/chartist-init.css') }}" rel="stylesheet">
<link href="{{ asset('assets/node_modules/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
<link href="{{ asset('assets/node_modules/css-chart/css-chart.css') }}" rel="stylesheet">
<!--This page css - Morris CSS -->
<link href="{{ asset('assets/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
<!-- widget css -->
<link href="{{ asset('dist/css/pages/widget-page.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor"></h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                </div>
            </div>
        </div> -->
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        @include('modals.login')

        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Dashboard</h3>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <form class="form-horizontal" method="get" action="{{ route('investments') }}">
                    <div class="row">
                        <div class="offset-md-7 col-md-3 p-r-0">
                            <select id="project_year" class="form-control" name="year">
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-info btn-block"><i class="ti-eye"></i> View</button>
                            <span class="help-block text-muted">
                                <a class="btn btn-link collapsed" href="#code2" data-toggle="collapse" aria-expanded="false"><i class="ti-settings"></i> advance</a>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="code2" class="highlight collapse" style="">
                    <div class="card">
                        <div class="card-body">
                        </div>
                    </div>
                </div>
                <!-- Card -->
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-success"><i class="ti-wallet"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">$18090</h3>
                                <h5 class="text-muted m-b-0">Income</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-info"><i class="ti-user"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">2690</h3>
                                <h5 class="text-muted m-b-0">Users</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-danger"><i class="ti-calendar"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">20 march</h3>
                                <h5 class="text-muted m-b-0">My birthday</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-success"><i class="ti-settings"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">6540</h3>
                                <h5 class="text-muted m-b-0">pending</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End Info box -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- TOTAL PROJECT STATUS -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-5 col-xlg-3 col-md-6">
                            <div class="card-body">
                                <h4 class="card-title">Visit source</h4>
                                <div id="m-piechart" style="width: 100%; height: 278px; -webkit-tap-highlight-color: transparent; user-select: none; background-color: rgba(0, 0, 0, 0); cursor: default;" _echarts_instance_="1551352550065"><div style="position: relative; overflow: hidden; width: 561px; height: 278px;"><div data-zr-dom-id="bg" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 561px; height: 278px; user-select: none;"></div><canvas width="701" height="347" data-zr-dom-id="0" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 561px; height: 278px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="701" height="347" data-zr-dom-id="1" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 561px; height: 278px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="701" height="347" data-zr-dom-id="_zrender_hover_" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 561px; height: 278px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas></div></div>
                                <center>
                                    <ul class="list-inline m-t-20">
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle m-r-5 text-success"></i>Mobile</h6> </li>
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle m-r-5 text-primary"></i>Desktop</h6> </li>
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle m-r-5 text-danger"></i>Tablet</h6> </li>
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle m-r-5 text-muted"></i>Other</h6> </li>
                                    </ul>
                                </center>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-lg-7 col-xlg-9 col-md-6 b-l p-l-0">
                            <ul class="product-review">
                                <li>
                                    <font class="text-muted display-5"><i class="mdi mdi-emoticon-cool"></i></font> <span>
                                        <h3 class="card-title">Positive Reviews</h3>
                                        <h6 class="card-subtitle">25547 Reviews</h6> 
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 65%; height:6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li>
                                    <font class="text-muted display-5"><i class="mdi mdi-emoticon-sad"></i></font> <span>
                                        <h3 class="card-title">Negative Reviews</h3>
                                        <h6 class="card-subtitle">5478 Reviews</h6> 
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%; height:6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li>
                                    <font class="text-muted display-5"><i class="mdi mdi-emoticon-neutral"></i></font> <span>
                                        <h3 class="card-title">Neutral Reviews</h3>
                                        <h6 class="card-subtitle">457 Reviews</h6> 
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 35%; height:6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Column -->
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- PROJECT BOX -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">PROJECT STATUS</h4>
                        <div class="table-responsive">
                            <table id="tableProjects" class="table table-bordered table-striped">
                                <colgroup>
                                    <col width="40%">
                                    <col width="21%">
                                    <col width="12%">
                                    <col width="12%">
                                    <col width="12%">
                                    <col width="5%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>Project Title</th>
                                        <th>Funding Agency</th>
                                        <th>Project Started</th>
                                        <th>Project End</th>
                                        <th>Project Cost (&#x20b1;)</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ( $researches as $research )
                                        <tr>
                                            <td><a href="javascript:void(0)" class="link"> {{ $research->publication_title }}</a></td>
                                            <td>{{ strtoupper($research->funding_agency) }}</td>
                                            <td><span class="text-muted">{{ $research->projectStarted}}</span></td>
                                            <td><span class="text-muted">{{ $research->projectEnded}}</span></td>
                                            <td class="text-right">{{ number_format( $research->project_cost, 2 ) }}</td>
                                            <td class="text-center">
                                                @if( $research->status )
                                                    <div class="label label-table label-success">Completed</div>
                                                @else
                                                    <div class="label label-table label-warning">Ongoing</div>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>empty</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        @include('layouts.rightbar')
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
@endsection

@section('scripts')
<!-- This is data table -->
<script src="{{ asset('assets/node_modules/datatables/datatables.min.js') }}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<script src="{{ asset('assets/node_modules/chartist-js/dist/chartist.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- Chart JS -->
<script src="{{ asset('assets/node_modules/echarts/echarts-all.js') }}"></script>
<!-- Flot Charts JavaScript -->
<script src="{{ asset('assets/node_modules/flot/excanvas.js') }}"></script>
<script src="{{ asset('assets/node_modules/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/node_modules/flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('assets/node_modules/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('dist/js/pages/widget-charts.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() { 
    // DataTable for Tracker
        var trackerTable = $('#tableProjects').DataTable({
            // ordering: false,
            dom: '<"top"l<"float-right"f>>rt<"bottom"i<"float-left"B><p>><"clear">',
            columnDefs: [{ 
                orderable: true 
            }],
            order: [
                [3, 'desc']
            ],
        });
    });
</script>

<script type="text/javascript">
    var start = 2000;
    var end = new Date().getFullYear();
    var options = "";
    for(var year = end ; year >= start ; year--){
      options += "<option>"+ year +"</option>";
    }
    document.getElementById("project_year").innerHTML = options;
</script>
@endsection