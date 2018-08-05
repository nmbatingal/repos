@extends('layouts.app')

@section('styles')
    <link href="{{ asset('dist/css/pages/other-pages.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Search Results</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Search Results</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        @include('layouts.modallogin')

        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Search Result For "{{ request('q') }}"</h4>
                        <h6 class="card-subtitle">About {{ $research->totalHits() }} result ({{ $research->took() }})</h6>
                        <ul class="search-listing">
                            @forelse($research as $record)
                                <li>
                                    <h3><a href="javacript:void(0)"><strong>{{ $record->title }}</strong></a></h3>
                                    <a href="javascript:void(0)" class="search-links">{{ url('/') }}</a>
                                    <p>
                                        {!! $record->abstract !!}
                                    </p>
                                    <p>Author: 
                                        @foreach(explode('|', $record->authors) as $author) 
                                            <a href="javascript:void(0)" class="search-links"><u>{{ $author }}</u></a>
                                        @endforeach
                                    </p>
                                    <p>Status: 
                                        <a href="javacript:void(0)" class="badge {{ $record->status ? 'badge-success' : 'badge-primary' }} text-white">
                                        {!! $record->status ? 'Completed' : 'Ongoing' !!}
                                        </a>
                                    </p>
                                    <p>Tags: 
                                        @foreach(explode('|', $record->keywords) as $keyword) 
                                            <a href="javacript:void(0)" class="badge badge-info text-white">{{ $keyword }}</a>
                                        @endforeach
                                    </p>
                                </li>
                            @empty
                                <p>No articles found</p>
                            @endforelse
                        </ul>

                        <!-- <nav aria-label="Page navigation example" class="m-t-40">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0)">Next</a>
                                </li>
                            </ul>
                        </nav> -->

                    </div>
                </div>
            </div>
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