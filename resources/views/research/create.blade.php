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
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create a new research article</h4>
                    <h6 class="card-subtitle">A repository contains all the files for your project, including the revision history.</h6>
                    <hr>
                    <form id="researchForm" class="form-horizontal" method="POST" action="{{ route('research.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group row p-t-20">
                                <label class="control-label text-right col-md-3">Research Title</label>
                                <div class="col-md-9">
                                    <input type="text" name="title" class="form-control" placeholder="Title here..." required>
                                    <!-- <small class="form-control-feedback"> This is inline help </small>  -->
                                </div>
                            </div>
                            <!--/row-->
                            <div class="form-group row p-b-20">
                                <label class="control-label text-right col-md-3">Author</label>
                                <div class="col-md-9">
                                    <input type="text" name="authors" class="form-control tags-input" data-role="tagsinput" placeholder="add author" required />
                                    <small class="form-control-feedback">Press enter to add. </small>
                                </div>
                            </div>
                            <!--/row-->

                            <hr>

                            <div class="form-group row p-t-20">
                                <label class="control-label text-right col-md-3">Category</label>
                                <div class="col-md-4">
                                    <select class="form-control custom-select" name="categoryDomain" required>
                                        <option>Select Domain...</option>
                                        @if(!empty($fields))
                                            @foreach( $fields as $value )
                                            <optgroup label="{{ $value->category_field }}">
                                                @foreach( $value->categoryDomains as $domain )
                                                    <option value="{{ $domain->id }}">{{ $domain->category_domain }}</option>
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select class="form-control custom-select" name="categorySubdomain" disabled required>
                                        <option>Select Subdomain...</option>
                                    </select>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Keywords</label>
                                <div class="col-md-9">
                                    <input type="text" name="keywords" class="form-control tags-input" data-role="tagsinput" placeholder="add keyword" required />
                                    <small class="form-control-feedback">Press enter to add. </small>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="form-group row p-b-20">
                                <label class="control-label text-right col-md-3">Upload PDF</label>
                                <div class="col-md-9">
                                    <input id="research_file" type="file" class="form-control" name="research_file" value="{{ old('research_file') }}" accept="application/pdf" required>
                                    <!-- <small class="form-control-feedback">Press enter to add. </small> -->
                                </div>
                            </div>
                            <!--/row-->

                            <hr>

                            <div class="form-group row p-t-20">
                                <label class="control-label text-right col-md-3">Project Duration</label>
                                <div class="col-md-9">
                                    <input id="project_duration" type="text" class="form-control" name="project_duration" value="{{ old('project_duration') }}" placeholder="project duration...">
                                    <!-- <small class="form-control-feedback">Press enter to add. </small> -->
                                </div>
                            </div>
                            <!--/row-->
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Funding Agency</label>
                                <div class="col-md-9">
                                    <input id="funding_agency" type="text" class="form-control" name="funding_agency" value="{{ old('funding_agency') }}" placeholder="funding agency...">
                                    <!-- <small class="form-control-feedback">Press enter to add. </small> -->
                                </div>
                            </div>
                            <!--/row-->
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Project Cost</label>
                                <div class="col-md-9">
                                    <input id="project_cost" type="text" class="form-control" name="project_cost" value="{{ old('project_cost') }}" placeholder="project cost...">
                                    <!-- <small class="form-control-feedback">Press enter to add. </small> -->
                                </div>
                            </div>
                            <!--/row-->

                            <hr>

                            <div class="form-group row p-20">
                                <label class="control-label text-right col-md-3">Completion Status</label>
                                <div class="col-md-9">
                                    <div class="radio-list">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="statusOngoing" name="status" value="Ongoing" class="custom-control-input">
                                            <label class="custom-control-label" for="statusOngoing">Ongoing</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="statusCompleted" name="status" value="Completed" class="custom-control-input">
                                            <label class="custom-control-label" for="statusCompleted">Completed</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->

                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="research_content" class="summernote" id="abstract" title="Contents" required>
                                            <h3>Abstract</h3><br>
                                            write here...
                                        </textarea>
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

<script type="text/javascript">
    $("select[name='categoryDomain']").change(function(){
        
        var id_domain = $(this).val();
        var token = $("input[name='_token']").val();

        $.ajax({
            method: 'POST',
            url: "{{ route('subdomain.list') }}",
            data: { id_domain:id_domain, _token:token},
            success: function(data) {
                $("select[name='categorySubdomain'").attr('disabled', false);
                $("select[name='categorySubdomain'").html('');
                $("select[name='categorySubdomain'").html(data.options);
            }
        });
    });
</script>

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