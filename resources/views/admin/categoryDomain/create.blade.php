@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Access Types</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Access Types</li>
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
        <div class="col-md-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="card card-body">
                <h3 class="box-title m-b-0">Create Category Domain</h3>
                <p class="text-muted m-b-30 font-13">Create new research article access type.</p>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form action="{{ route('domain.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="category_field">Category Field</label>
                                <select class="custom-select col-12" id="category_field" name="category_field" required="">
                                    <option selected="">Choose...</option>
                                    @foreach($catFields as $field)
                                        <option value="{{ $field->id }}">{{ $field->category_field }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category_domain">Category Domain</label>
                                <input type="text" class="form-control" id="category_domain" name="category_domain" placeholder="Enter category domain name" value="{{ old('category_domain') }}" required>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                            <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category Domain List</h4>
                    <h6 class="card-subtitle">View access types to control research article for user usage.</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            @if ($catDomains->count() > 0 )
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Field</th>
                                        <th>Domain</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            @endif
                            <tbody>
                                @forelse($catDomains as $domain)
                                    <tr>
                                        <td>{{ $domain->id }}</td>
                                        <td>{{ $domain->categoryField->category_field }}</td>
                                        <td>{{ $domain->category_domain }}</td>
                                        <td>
                                            <button></button>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No data found</p>
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
    @include('admin.layouts.rightbar')
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
@endsection

@section('scripts')
@endsection