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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" action="{{ url('search') }}" method="GET" class="form-horizontal row m-t-0 p-0">
                            <div class="col-12">
                                <div class="form-group row m-b-10">
                                    <div class="offset-md-1 col-md-10 m-b-0">
                                        <h4>Search for reasearch articles and open access content by typing keywords in the search box.</h4>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1 offset-md-1">
                                        <input type="text" name="keywords" class="form-control" placeholder="Keywords">
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
<script>
    $("select[name='domain']").change(function(){
        
        var id_domain = $('option:selected', this).data('subject');
        var token = $("input[name='_token']").val();

        $.ajax({
            method: 'POST',
            url: "{{ route('subdomain.list') }}",
            data: { id_domain:id_domain, _token:token},
            success: function(data) {

                if ( data.options != false )
                { 
                    $("select[name='subdomain'").html('');
                    $("select[name='subdomain'").html(data.options);
                    $("select[name='subdomain'").attr('disabled', false);
                } else {
                    $("select[name='subdomain'").html('<option>All Subdomain</option>');
                    $("select[name='subdomain'").attr('disabled', true);
                }
            }
        });
    });
</script>
@endsection