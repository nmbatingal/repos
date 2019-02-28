@extends('layouts.app')

@section('styles')
<link href="{{ asset('dist/css/pages/other-pages.css') }}" rel="stylesheet">
<link href="{{ asset('dist/css/pages/floating-label.css') }}" rel="stylesheet">
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
                <h4 class="text-themecolor">R&D Investments Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <form class="form-horizontal">
                        <select class="form-control">
                            <option>2018</option>
                            <option>2018</option>
                            <option>2018</option>
                        </select>
                        <button class="btn btn-info btn-block">View</button>
                    </form>
                </div>
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
                        <h5 class="card-title">TOTAL VISIT</h5>
                        <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                            <div id="sparklinedash"></div>
                            <div class="ml-auto">
                                <h2 class="text-success"><i class="ti-arrow-up"></i> <span class="counter">8659</span></h2>
                            </div>
                        </div>
                    </div>
                    <div id="sparkline8" class="sparkchart"></div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">TOTAL PAGE VIEWS</h5>
                        <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                            <div id="sparklinedash2"></div>
                            <div class="ml-auto">
                                <h2 class="text-purple"><i class="ti-arrow-up"></i> <span class="counter">7469</span></h2>
                            </div>
                        </div>
                    </div>
                    <div id="sparkline8" class="sparkchart"></div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">UNIQUE VISITOR</h5>
                        <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                            <div id="sparklinedash3"></div>
                            <div class="ml-auto">
                                <h2 class="text-info"><i class="ti-arrow-up"></i> <span class="counter">6011</span></h2>
                            </div>
                        </div>
                    </div>
                    <div id="sparkline8" class="sparkchart"></div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">BOUNCE RATE</h5>
                        <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                            <div id="sparklinedash4"></div>
                            <div class="ml-auto">
                                <h2 class="text-danger"><i class="ti-arrow-down"></i> <span class="counter">18%</span></h2>
                            </div>
                        </div>
                    </div>
                    <div id="sparkline8" class="sparkchart"></div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End Info box -->
        <!-- ============================================================== -->
        <table class="table">
            @forelse ( $researches as $research )
            <tr>
                <td>{{ $research->publication_title }}</td>
            </tr>
            @empty
            <tr>
                <td>empty</td>
            </tr>
            @endforelse
        </table>
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
<script src="{{ asset('dist/js/custom.min.js') }}"></script>
<script src="{{ asset('dist/js/pages/jasny-bootstrap.js') }}"></script>
@endsection