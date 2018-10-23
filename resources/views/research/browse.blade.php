@extends('layouts.app')

@section('styles')
<link href="{{ asset('dist/css/pages/other-pages.css') }}" rel="stylesheet">
<style>
    .search-listing li {
        border-bottom: none;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

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
                        <div class="col-md-12">
                            <div class="form-group row m-t-40">
                                <div class="offset-md-4 col-md-4">
                                    <h1>Showing {{ $researches->count() }} research articles</h1>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class=" offset-md-4 col-md-4">
                                    <input type="text" name="title" class="form-control" placeholder="Research title" value="{{ request('title') }}">
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-info btn-block"><i class="fa fa-search"></i> search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="offset-md-2 col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="stickyside">
                                <h1></h1>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <ul class="search-listing">
                                @forelse($researches as $record)
                                    <li>
                                        <h3>
                                            <a href="{{ route('research.show', ['id' => $record->id]) }}" class="text-primary">
                                                <strong>{!! $record->publication_title !!}</strong>
                                            </a>
                                        </h3>
                                        <span>Research Article
                                            <span class="p-l-10 p-r-10">
                                                @if( $record->status )
                                                    <i class="wi wi-moon-alt-new text-success"></i>
                                                @else
                                                    <i class="wi wi-moon-alt-full"></i>
                                                @endif
                                            </span>
                                            <i>{!! $record->status ? 'Completed' : 'Ongoing' !!}</i>
                                            , {{ $record->project_duration }}
                                        </span>
                                    </li>
                                @empty
                                    <h4>No research articles found</h4>
                                @endforelse
                            </ul>
                        </div>
                    </div>
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

<script>
    // This is for the sticky sidebar    
    $(".stickyside").stick_in_parent({
        offset_top: 100
    });
</script>
<script type="text/javascript">

    $("button.btn-delete").click( function(){
        var token = $(this).data('token');
        var id = $(this).data('id');

        $.ajax({
            url: '{{ url('/research/') }}' + '/' + id,
            type: 'post',
            data: {_method: 'delete', _token :token},
            success: function( msg ) {
                if ( msg.status === 'success' ) {
                    // toastr.success( msg.msg );
                    setInterval(function() {
                        window.location.reload();
                    }, 1000);
                }
            },
            error: function( data ) {
                if ( data.status === 422 ) {
                    toastr.error('Cannot delete the category');
                }
            }
        });
    });
</script>
@endsection