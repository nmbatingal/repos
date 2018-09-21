@extends('layouts.app')

@section('styles')
<link href="{{ asset('dist/css/pages/other-pages.css') }}" rel="stylesheet">
<style type="text/css">
    /*body {
        font-size: 20px;
    }*/

    footer {
        font-size: 14px;
    }

</style>
@endsection

@section('content')
<div class="container-fluid">
    @include('modals.login')

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- search row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form role="form" action="{{ url('search') }}" method="GET" class="form-horizontal row m-t-0 p-0">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="offset-md-8 col-md-2">
                                    <input type="text" name="title" class="form-control" placeholder="Research title" value="{{ request('title') }}">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-info"><i class="fa fa-search"></i></button>
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
        <div class="col-lg-10 col-md-12 offset-lg-1">
            <div class="card">
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="stickyside m-t-20">
                                <div class="accordion" id="accordionExample1">
                                    <div class="card m-b-0">
                                        <div class="card-header bg-white p-0" id="heading1">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#download" aria-expanded="true" aria-controls="collapse1">
                                                    Download
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="download" class="collapse show" aria-labelledby="heading1" data-parent="#accordionExample1">
                                            <div class="card-body">
                                                <!-- DOWNLOADS ACCESS TYPE VARY -->
                                                @if( $research->access_type )
                                                    <a href="{{ asset('storage/research_file/'.$research->id.'/'.$research->filename) }}" class="text-info">
                                                        <img src="{{ asset('images/logo/adobe-pdf-icon.png') }}" height="35px" class="p-r-10"> PDF file ({{ $research->file_size }})
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0)" class="text-muted">
                                                        <img src="{{ asset('images/logo/adobe-pdf-icon.png') }}" height="35px" class="p-r-10"> PDF file ({{ $research->file_size }}) <i class="icon-lock"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="card-title">{{ $research->publication_title }}</h2>
                                    <h5 class="">{{ $research->categorySubdomain->category_subdomain }}</h5>
                                    <p class="m-t-10">
                                        @foreach(json_decode($research->authors) as $key => $author) 
                                            <a href="javascript:void(0)" class="text-info text-underline">{!! $author->name !!}&nbsp;&nbsp;&nbsp;</a>
                                        @endforeach
                                    </p>

                                    <span>Project funded by {{ $research->funding_agency }},</span>
                                    <span>{{ $research->project_duration }}</span>
                                    <br>
                                    <span>
                                        @if( $research->status )
                                            <i class="wi wi-moon-alt-new text-success"></i>
                                        @else
                                            <i class="wi wi-moon-alt-full"></i>
                                        @endif
                                    </span>
                                    <i>{!! $research->status ? 'Completed' : 'Ongoing' !!} Project</i>
                                    <hr>
                                </div>
                            </div>
                            <!-- <h4 class="card-title" id="abstract">Abstract</h4> -->
                            <p>
                                {!! $research->research_content !!}
                            </p>
                            <!-- <h4 class="card-title" id="references">References</h4> -->
                            <p class="m-t-20">
                                <h3>Keywords:</h3><br>
                                <?php $prefix = ''; ?>
                                @foreach($research->key_word as $keyword) 
                                    <button class="btn btn-secondary">{{ $keyword }}</button>
                                    <?php $prefix = ', '; ?>
                                @endforeach
                            </p>
                            <hr class="m-t-40 m-b-40">

                            @if( $research->access_type )
                                <div id="pdfViewer"></div>
                                <a id="pdfHref" href="{{ asset('storage/research_file/'.$research->id.'/'.$research->filename) }}" class="text-info">
                                    <img src="{{ asset('images/logo/adobe-pdf-icon.png') }}" height="40px" class="p-r-10"> Download PDF file
                                </a>
                            @else
                                <p>Please <a href="{{ route('register') }}">request</a> admin to access PDF file.</p>
                            @endif
                        </div>
                    </div>
                    <p>
                    </p>
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
<!--stickey kit -->
<script src="{{ asset('assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- PDF Viewer -->
<script src="{{ asset('pdfobject-master/pdfobject.js') }}"></script>

@if( $research->access_type )
<script>
    var href = $("#pdfHref").attr('href');
    var options = {
        height: '800px',
        pdfOpenParams: {
            toolbar: false,
            statusbar: false,
            view: "FitH"
        },
        fallbackLink: "<p>Your browser doesn't support inline PDFs.</p>",
        forcePDFJS: true
    };

    PDFObject.embed(href, "#pdfViewer", options);
</script>
@endif


<script>
    // This is for the sticky sidebar    
    $(".stickyside").stick_in_parent({
        offset_top: 100
    });
</script>
@endsection