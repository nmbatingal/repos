@extends('layouts.app')

@section('styles')
    <link href="{{ asset('dist/css/pages/other-pages.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- <div class="row page-titles">
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
        </div> -->
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        @include('modals.login')

        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                    </div>
                </div>
            </div> -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('search') }}" method="get" class="form-horizontal p-b-40">
                            <div class="input-group">
                                <input 
                                    type="text" 
                                    class="form-control form-control-lg" 
                                    placeholder="Search for research title"
                                    name="title"
                                    value="{{ request('title') }}"
                                    required 
                                >
                              <div class="input-group-append">
                                <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>

                        <h4 class="card-title">Search Result For "{{ request('title') }} {{ request('q') }}"</h4>
                        <h6 class="card-subtitle">About {{ $research->totalHits() }} result ({{ $research->took() / 1000.0 }} seconds)</h6>
                        <ul class="search-listing">
                            @forelse($research as $record)
                                <li>
                                    <h3>
                                        <a href="{{ route('research.show', ['id' => $record->id]) }}">
                                            <strong>{{ $record->publication_title }}</strong>
                                        </a>
                                    </h3>
                                    <a href="{{ route('research.show', ['id' => $record->id]) }}" class="search-links">
                                        {{ route('research.show', ['id' => $record->id]) }}
                                    </a>
                                    <br>
                                        <img src="{{ asset('images/logo/adobe-pdf-icon.png') }}" height="20px" class="p-r-10">
                                        <span class="text-info">
                                            <i>{{ $record->access_type ? 'Subscribed and Complimentary' : 'Open Access' }}</i>
                                        </span>
                                    <p class="m-t-10">
                                        {!! str_limit($record->research_content, 700) !!}
                                    </p>
                                    <br>Author: 
                                        @foreach($record->authors as $author) 
                                            <a href="#" data-q="{{ $author['name'] }}" class="search-links a-links"><u>{!! $author['name'] !!}</u></a>
                                        @endforeach
                                    <br>Project Status: 
                                        <a href="javacript:void(0)" class="badge {{ $record->status ? 'badge-success' : 'badge-primary' }} text-white">
                                        {!! $record->status ? 'Completed' : 'Ongoing' !!}
                                        </a>
                                    <br>Keywords: 
                                        @foreach(explode(',', $record->keywords) as $keyword) 
                                            <a href="#" data-q="{{ $keyword }}" class="badge badge-info text-white a-links">{!! $keyword !!}</a>
                                        @endforeach
                                </li>
                            @empty
                                <p>No research articles found</p>
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

@section('scripts')
<script type="text/javascript">
    $(document).ready( function(){

        $("a.a-links").click(function(){

            var search = $(this).attr('data-q');
            var $input = $('input[name=q]').val(search);

            $("#searchForm").submit();
        });
    });
</script>
@endsection