@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">My Research</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">My Research</li>
                </ol>
                <a href="{{ route('research.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    @include('modals.login')

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">My Research List</h4>
                    <h6 class="card-subtitle">View research made by researcher.</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            @if ($researches->count() > 0 )
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            @endif
                            <tbody>
                                @forelse($researches as $research)
                                    <tr>
                                        <td>{{ $research->id }}</td>
                                        <td>{{ $research->title }}</td>
                                        <td>
                                            <a href="{{ url('/research/'. $research->id ) }}" class="btn btn-sm btn-info"><i class="fa fa-search"></i> View</a>
                                            <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $research->id }}" data-token="{{ csrf_token() }}"><i class="fa fa-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No research articles found</p>
                                @endforelse
                            </tbody>
                        </table>
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