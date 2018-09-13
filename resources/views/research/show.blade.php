@extends('layouts.app')

@section('styles')
<link href="{{ asset('dist/css/pages/other-pages.css') }}" rel="stylesheet">
<style type="text/css">
    body {
        font-size: 20px;
    }

    footer {
        font-size: 14px;
    }

</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Research Article</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Research Article</li>
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
        <!-- <div class="col-lg-2 col-md-4 hidden-sm-down">
            <div class="stickyside">
                <div class="list-group" id="top-menu">
                    <a href="#abstract" class="list-group-item active">&nbsp;</a>
                    <a href="#references" class="list-group-item">&nbsp;</a>
                    <a href="#3" class="list-group-item hidden">&nbsp;</a>
                    <a href="#4" class="list-group-item hidden">&nbsp;</a>
                    <a href="#5" class="list-group-item hidden">&nbsp;</a>
                    <a href="#6" class="list-group-item hidden">&nbsp;</a>
                    <a href="#7" class="list-group-item hidden">&nbsp;</a>
                    <a href="#8" class="list-group-item hidden">&nbsp;</a>
                </div>
            </div>
        </div> -->
        <div class="col-lg-10 col-md-12 offset-lg-1">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-primary">{{ $research->publication_title }}</h2>
                    <h5> Posted on: {{ $research->posted_on }}</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="stickyside m-t-20">
                                <p>Outline</p>
                                <ul>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                </ul>
                                <hr>
                                <!-- DOWNLOADS ACCESS TYPE VARY -->
                                @if( !$research->access_type )
                                    <a id="pdfHref" href="{{ asset('storage/research_file/'.$research->id.'/'.$research->filename) }}" class="text-info">
                                        <img src="{{ asset('images/logo/adobe-pdf-icon.png') }}" height="40px" class="p-r-10"> Download PDF file
                                    </a>
                                @else
                                    <a href="javascript:void(0)" class="text-info">
                                        <img src="{{ asset('images/logo/adobe-pdf-icon.png') }}" height="40px" class="p-r-10"> Download PDF file (subscribe)
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="m-t-20">
                                        Author:<br>
                                        @foreach(json_decode($research->authors) as $key => $author) 
                                            <a href="#" data-q="{{ $author->name }}" class="text-muted text-underline"><u>{!! $author->name !!}</u></a><br>
                                        @endforeach
                                        
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="m-t-20">
                                        Access Type:<br>
                                        <span class="text-primary"><i>{{ $research->access_type ? 'Subscribed and Complimentary' : 'Open Access' }}</i></span>
                                    </p>
                                    <p class="m-t-20">
                                        Project Completion:<br>
                                        <a href="javacript:void(0)" class="badge {{ $research->status ? 'badge-success' : 'badge-primary' }} text-white">
                                        {!! $research->status ? 'Completed' : 'Ongoing' !!}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <hr class="m-t-40 m-b-40">
                            <!-- <h4 class="card-title" id="abstract">Abstract</h4> -->
                            <p>
                                {!! $research->research_content !!}
                            </p>
                            <!-- <h4 class="card-title" id="references">References</h4> -->
                            <p class="m-t-20">
                                Keywords:<br>
                                @foreach(explode(',', $research->keywords) as $keyword) 
                                    <a href="javascript:void(0)" data-q="{{ $keyword }}" class="badge badge-info text-white a-links">
                                        {!! $keyword !!}
                                    </a>
                                @endforeach
                            </p>
                            <hr class="m-t-40 m-b-40">
                            <div id="pdfViewer">
                            </div>
                            @if( !$research->access_type )
                                <a id="pdfHref" href="{{ asset('storage/research_file/'.$research->id.'/'.$research->filename) }}" class="text-info">
                                    <img src="{{ asset('images/logo/adobe-pdf-icon.png') }}" height="40px" class="p-r-10"> Download PDF file
                                </a>
                            @endif
                        </div>
                    </div>
                    <p>
                    </p>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-2 col-md-4 hidden-sm-down">
            <div class="stickyside">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-primary">{{ $research->publication_title }}</h4>
                        <p>
                            @foreach(json_decode($research->authors) as $key => $author) 
                                <a href="#" data-q="{{ $author->name }}" class="text-muted text-underline"><u>{!! $author->name !!}</u></a>
                            @endforeach
                            <br> Posted on: {{ $research->created_at }}
                        </p>
                        <button class="btn btn-primary waves-effect waves-light" type="button">
                            <span class="btn-label"><i class="fa fa-print"></i></span> Print
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Share
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <ul class="list-unstyled m-b-0">
                        <li class="media m-b-0">
                            <img class="d-flex mr-3" src="{{ asset('images/save.jpg') }}" width="60" alt="file download image">
                            <div class="media-body">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">
                                        <a href="#" class="text-info">
                                            {{ $research->filename }}
                                        </a>
                                    </h5>
                                    <small><i class="fa fa-lock"></i></small>
                                </div>
                                <small class="text-muted">Size: {{ $research->file_size }}</small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->
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

@if( !$research->access_type )
<script>
    var options = {
        height: '800px',
        pdfOpenParams: {
            toolbar: true,
            statusbar: true,
            view: "FitH"
        }
    };

    PDFObject.embed("{{ asset('storage/research_file/'.$research->id.'/'.$research->filename) }}", "#pdfViewer", options);
</script>
@endif


<script>
    // This is for the sticky sidebar    
    $(".stickyside").stick_in_parent({
        offset_top: 100
    });
    
    $('.stickyside a').click(function() {
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top - 100
        }, 500);
        return false;
    });

    // This is auto select left sidebar
    // Cache selectors
    // Cache selectors
    var lastId,
        topMenu = $(".stickyside"),
        topMenuHeight = topMenu.outerHeight(),
        // All list items
        menuItems = topMenu.find("a"),
        // Anchors corresponding to menu items
        scrollItems = menuItems.map(function() {
            var item = $($(this).attr("href"));
            if (item.length) {
                return item;
            }
        });

    // Bind click handler to menu items


    // Bind to scroll
    $(window).scroll(function() {
        // Get container scroll position
        var fromTop = $(this).scrollTop() + topMenuHeight - 250;

        // Get id of current scroll item
        var cur = scrollItems.map(function() {
            if ($(this).offset().top < fromTop)
                return this;
        });
        // Get the id of the current element
        cur = cur[cur.length - 1];
        var id = cur && cur.length ? cur[0].id : "";

        if (lastId !== id) {
            lastId = id;
            // Set/remove active class
            menuItems
                .removeClass("active")
                .filter("[href='#" + id + "']").addClass("active");
        }
    });
</script>
@endsection