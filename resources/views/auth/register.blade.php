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
            <h4 class="text-themecolor">Register Account</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Register Account</li>
                </ol>
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
        <div class="col-lg-8">
            <div class="card ">
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <h3 class="box-title">Person Info</h3>
                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">First Name</label>
                                        <div class="col-md-9">
                                            <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>
                                            @if ($errors->has('firstname'))
                                                <small class="form-control-feedback">{{ $errors->first('firstname') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Last Name</label>
                                        <div class="col-md-9">
                                            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required>
                                            @if ($errors->has('lastname'))
                                                <small class="form-control-feedback">{{ $errors->first('lastname') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Email</label>
                                        <div class="col-md-9">
                                            <input id="reg_email" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="email address" required>
                                            @if ($errors->has('email'))
                                                <small class="form-control-feedback">{{ $errors->first('email') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Contact</label>
                                        <div class="col-md-9">
                                            <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="mobile number">
                                            @if ($errors->has('mobile'))
                                                <small class="form-control-feedback">{{ $errors->first('mobile') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Username</label>
                                        <div class="col-md-9">
                                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                                            @if ($errors->has('username'))
                                                <small class="form-control-feedback">{{ $errors->first('username') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('password') ? 'has-danger' : '' }} row">
                                        <label class="control-label text-right col-md-3">Password</label>
                                        <div class="col-md-9">
                                            <input id="reg_password" type="password" class="form-control {{ $errors->has('password') ? 'form-control-danger' : '' }}" name="password" value="{{ old('password') }}" required>
                                            @if ($errors->has('password'))
                                                <small class="form-control-feedback">{{ $errors->first('password') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Confirm</label>
                                        <div class="col-md-9">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="confirm password" required>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <hr>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                                <button type="button" class="btn btn-inverse">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
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
