@extends('layouts.app')

@section('styles')
<!-- summernote texteditor css -->
<link href="{{ asset('summernote/dist/summernote-bs4.css') }}" rel="stylesheet">
<link href="{{ asset('dist/css/pages/floating-label.css') }}" rel="stylesheet">
<link href="{{ asset('bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" />
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
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('research.index') }}">Research</a></li>
                    <li class="breadcrumb-item active">Create</li>
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create a new research article</h4>
                    <h6 class="card-subtitle">A repository contains all the files for your project, including the revision history.</h6>
                    <hr>
                    <form id="researchForm" class="form-horizontal" method="POST" action="{{ route('research.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="row p-t-20">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Research Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title here..." required>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Author</label>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" name="authors" class="form-control tags-input" data-role="tagsinput" placeholder="add author" required />
                                            </div>
                                        </div>

                                        <small class="form-control-feedback">Press enter to add. </small> 
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Keywords</label>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" name="keywords" class="form-control tags-input" data-role="tagsinput" placeholder="add keyword" required />
                                            </div>
                                        </div>

                                        <small class="form-control-feedback">Press enter to add. </small> 
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Upload File</label>
                                        <input id="research_file" type="file" class="form-control" name="research_file" value="{{ old('research_file') }}" required>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Project Duration</label>
                                        <input id="project_duration" type="text" class="form-control" name="project_duration" value="{{ old('project_duration') }}" placeholder="project duration...">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Funding Agency</label>
                                        <input id="funding_agency" type="text" class="form-control" name="funding_agency" value="{{ old('funding_agency') }}" placeholder="funding agency...">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Project Cost</label>
                                        <input id="project_cost" type="text" class="form-control" name="project_cost" value="{{ old('project_cost') }}" placeholder="project cost...">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Project Status Completed</label>
                                            <input id="status" type="checkbox" class="form-control" name="status">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <h3 class="card-subtitle">Research Content</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="research_content" class="summernote" id="abstract" title="Contents" required>{{ old('research_content') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                            <button type="button" class="btn btn-inverse">Cancel</button>
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
<!-- summernote texteditor js -->
<script src="{{ asset('summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
<script>
    $(function() {

        $('.summernote').summernote({
            placeholder: 'write here...',
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false, // set focus to editable area after initializing summernote
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
                ['font', ['fontname', 'color', 'strikethrough', 'superscript', 'subscript']],
                ['tab', ['table', 'hr']],
                ['para', ['height', 'ul', 'ol', 'paragraph']],
                ['more', ['fullscreen', 'codeview', 'help']],
            ],
            disableDragAndDrop: true
        });

        $('input.tags-input').tagsinput({
            confirmKeys: [44]
        });

        /*$("#researchForm").submit( function() {

            var $content = $('textarea.summernote').val();

            $('<textarea>').attr('type', 'hidden')
                .attr('name', "clean_content")
                .attr('value', $content)
                .appendTo(this);

            return true;

        });*/

    });
</script>
@endsection