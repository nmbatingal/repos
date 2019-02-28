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
                <h3 class="text-themecolor font-weight-bold m-b-0">Dashboard</h3>
                <h5 class="text-themecolor">R&D Investments for {{ request('year') }}</h5>
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
                                <h3 class="m-b-0">&#x20b1; {{ number_format( $researches->sum('project_cost'), 2 ) }}</h3>
                                <h5 class="text-muted m-b-0">Total Investments</h5></div>
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
                                <h3 class="m-b-0">{{ $researches->count() }}</h3>
                                <h5 class="text-muted m-b-0">Total No. of Projects</h5></div>
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
                            <div class="round align-self-center round-primary"><i class="ti-settings"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">{{ $researches->groupBy('funding_agency')->count() }}
                                </h3>
                                <h5 class="text-muted m-b-0">Total No. of Funding Agencies</h5></div>
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
                            <div class="round align-self-center round-success"><i class="ti-calendar"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">{{ $researches->filter(function ($value, $key) 
                                                        { return $value->status == true ; })->count()
                                                   }}
                                </h3>
                                <h5 class="text-muted m-b-0">Total No. of Projects Completed</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End Info box -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 align-self-center">
                            <div class="card-body">
                                <h3>Total Amount of Project Invested</h3>
                                <div id="totalInvestments" class="chartist-chart" style="height: 450px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- TOTAL PROJECT STATUS -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body p-0">
                                <h4 class="card-title p-10">PROJECT FUNDS</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped m-b-0">
                                        <thead>
                                            <tr>
                                                <th>Funding Agency</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $fundingAgencies = $researches->groupBy('funding_agency');
                                            @endphp
                                            @forelse ( $fundingAgencies as $research )
                                            <tr>
                                                <td>{{ $research[0]->funding_agency }}</td>
                                                <td><i class="text-muted mdi mdi-briefcase"></i> {{ $research->count() }} project/s</td>
                                                <td>&#x20b1; {{ number_format( $research->sum('project_cost'), 2 ) }}</td>
                                            </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4>TOTAL &#x20b1; {{ number_format( $researches->sum('project_cost'), 2 ) }}</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h4 class="card-title p-10">PROJECTS PER YEAR</h4>
                                <div id="yearlyProjects" class="chartist-chart" style="height: 300px;"></div>
                            </div>
                        </div>
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

<script>
    $(function () {

        var summaryYears = ({!! $summaryYears !!}),
            fundingAgencies = ({!! $funding_agencies !!}),
            labelYears = [],
            projectCount = [],
            seriesCost = [];

        console.log(summaryYears);

        $.each (summaryYears, function(index, value) {
            
            labelYears.push(value.year.substring(0, 4));
            projectCount.push(value.project_count);
            seriesCost.push(value.project_cost);
            //console.log ("INDEX:  "  +  index  + "VALUE:  "  +  value.year) ;
        });

        // ============================================================== 
        // User analytics
        // ============================================================== 
        new Chartist.Line('#totalInvestments', {
            labels: labelYears, 
            series: [
                seriesCost,
                // projectCount
            ]
            }, {
            high: Math.max(seriesCost), 
            low: 0, 
            showArea: true,
            lineSmooth: Chartist.Interpolation.simple({
                divisor: 10
            }), 
            fullWidth: true, 
            chartPadding: 0, 
            plugins: [
                Chartist.plugins.tooltip()
              ], // As this is axis specific we need to tell Chartist to use whole numbers only on the concerned axis
            axisY: {
                onlyInteger: true
                , offset: 100
                , labelInterpolationFnc: function (value) {
                    return value;
                    // return (value / 1000) + 'k';
                    // return (value / 1000) + 'k';
                }
            },
        });

        new Chartist.Line('#yearlyProjects', {
            labels: labelYears, 
            series: [
                projectCount
            ]
            }, {
            high: Math.max(seriesCost), 
            low: 0, 
            showArea: true,
            lineSmooth: Chartist.Interpolation.simple({
                divisor: 10
            }), 
            fullWidth: true, 
            chartPadding: 0, 
            plugins: [
                Chartist.plugins.tooltip()
              ], // As this is axis specific we need to tell Chartist to use whole numbers only on the concerned axis
            axisY: {
                onlyInteger: true
                , offset: 100
                , labelInterpolationFnc: function (value) {
                    return value;
                    // return (value / 1000) + 'k';
                    // return (value / 1000) + 'k';
                }
            },
        });
    });
</script>

<script type="text/javascript">
    var start = 2000;
    var end = new Date().getFullYear();
    var options = "";
    for(var year = end ; year >= start ; year--)
    {
        if ( {{ request('year') }} == year ) 
        {
            $option = "<option selected>";
        } else {
            $option = "<option>";
        }

        options += $option + year +"</option>";
    }
    document.getElementById("project_year").innerHTML = options;
</script>
@endsection