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
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor"></h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
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
        <div class="row m-b-20">
            <div class="col-md-6 offset-md-3">
                <div class="jumbotron">
                    <h1 class="display-4">Hello, researchers!</h1>
                    <p class="lead">
                        Browse over {{ $research->count() }} research articles by typing keywords in the search box and press enter.
                    </p>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ url('search') }}" method="get" class="floating-labels m-t-40">
                                        <div class="form-group m-b-40">
                                            <input 
                                                type="text" 
                                                class="form-control" 
                                                name="title"
                                                value="{{ old('title') }}"
                                                id="title"
                                            >
                                            <span class="bar"></span>
                                            <label for="title">Search for research title</label>
                                        </div>
                                        <h5 class="font-bold">And/or refine by</h5>
                                        <div class="row">
                                            <div class="form-group m-b-40 m-t-20 col-md-6">
                                                <select class="form-control p-0" name="domain" id="domain">
                                                    <option></option>
                                                    @if(!empty($fields))
                                                        @foreach( $fields as $value )
                                                            <option class="font-bold" value="{{ $value->id .',0' }}">{{ $value->category_field }}</option>
                                                            @foreach( $value->categoryDomains as $domain )
                                                                <option value="{{ $value->id .','. $domain->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $domain->category_domain }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <span class="bar"></span>
                                                <label for="domain">Domain</label>
                                            </div>
                                            <div class="form-group m-b-40 m-t-20 col-md-6">
                                                <select class="form-control p-0" name="subdomain" id="subdomain" disabled>
                                                    <option></option>
                                                </select>
                                                <span class="bar"></span>
                                                <label for="subdomain">Subdomain</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-info btn-block" type="submit"><i class="fa fa-search"></i> Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="card">
                    <div class="card-body">
                        <form action="{{ url('search') }}" method="get">
                            <div class="input-group">
                                <input 
                                    type="text" 
                                    class="form-control form-control-lg" 
                                    placeholder="Search..."
                                    name="q"
                                    value="{{ request('q') }}"
                                    required 
                                >
                              <div class="input-group-append">
                                <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div> -->
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
<script type="text/javascript">
    $("select[name='domain']").change(function(){
        
        var id_domain = $(this).val();
        var token = $("input[name='_token']").val();

        $.ajax({
            method: 'POST',
            url: "{{ route('subdomain.list') }}",
            data: { id_domain:id_domain, _token:token},
            success: function(data) {
                $("select[name='subdomain'").attr('disabled', false);
                $("select[name='subdomain'").html('');
                $("select[name='subdomain'").html(data.options);
            }
        });
    });
</script>
@endsection