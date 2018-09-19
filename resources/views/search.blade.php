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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" action="{{ url('search') }}" method="GET" class="form-horizontal row m-t-0 p-0">
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-1 offset-md-1">
                                        <input type="text" name="keywords" class="form-control" placeholder="Keywords" value="{{ request('keywords') }}">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" name="author" class="form-control" placeholder="Author name">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="title" class="form-control" placeholder="Research title">
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control p-0" name="domain" id="domain" placeholder="Domain">
                                            <option value="">All Domain</option>
                                            @if(!empty($fields))
                                                @foreach( $fields as $value )
                                                    <option class="font-bold" value="{{ $value->category_field }}" data-subject="{{ $value->id .',0' }}">{{ $value->category_field }}</option>
                                                    @foreach( $value->categoryDomains as $domain )
                                                        <option value="{{ $domain->category_domain }}" data-subject="{{ $value->id .','. $domain->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $domain->category_domain }}</option>
                                                    @endforeach
                                                </optgroup>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control p-0" name="subdomain" id="subdomain" disabled>
                                            <option value="">All Subdomain</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-info btn-block"><i class="fa fa-search"></i> search</button>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="javascript:void(0)">Advanced search</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-9">
                        <ul class="search-listing">
                            @forelse($research as $record)
                                <li>
                                    <span>Research Article
                                        <span class="p-l-10 p-r-10">
                                            @if( $record->status )
                                                <i class="wi wi-moon-alt-new text-success"></i>
                                            @else
                                                <i class="wi wi-moon-alt-full"></i>
                                            @endif
                                        </span>
                                        <i>{!! $record->status ? 'Completed' : 'Ongoing' !!}</i>
                                    </span>
                                    <h3>
                                        <a href="{{ route('research.show', ['id' => $record->id]) }}" class="text-primary">
                                            <strong>{{ $record->publication_title }}</strong>
                                        </a>
                                    </h3>
                                    <span>
                                        <a href="javascript:void(0)">{{ $record->category_subdomain_id }}</a>,
                                        ss
                                    </span>
                                    <p class="m-t-10">
                                        {!! str_limit($record->research_content, 700) !!}
                                    </p>
                                    <br>
                                        <?php $prefix = ''; ?>
                                        @foreach($record->authors as $author) 
                                            <a href="javascript:void(0)" class="text-muted">{{ $prefix }}{!! $author['name'] !!}</a>
                                            <?php $prefix = ', '; ?>
                                        @endforeach
                                    <br>
                                    <div class="p-t-10">
                                        <img src="{{ asset('images/logo/adobe-pdf-icon.png') }}" height="20px" class="p-r-10">
                                        <a href="javascript:void(0)" class="text-info">
                                            PDF file ({{ $record->file_size }})
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <p>No research articles found</p>
                            @endforelse
                        </ul>
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