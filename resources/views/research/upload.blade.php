@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Upload Research</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('research.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title" class="col-md-3 control-label">Title</label>
                            <div class="col-md-9">
                                <textarea id="title" class="form-control" name="title" rows="3" required autofocus>{{ old('title') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-md-3 control-label">Author</label>
                            <div class="col-md-9">
                                <input id="author" type="text" class="form-control" name="author" value="{{ old('author') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-md-3 control-label">Project Duration</label>
                            <div class="col-md-9">
                                <input id="project_duration" type="text" class="form-control" name="project_duration" value="{{ old('project_duration') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-md-3 control-label">Funding Agency</label>
                            <div class="col-md-9">
                                <input id="funding_agency" type="text" class="form-control" name="funding_agency" value="{{ old('funding_agency') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-md-3 control-label">Project Cost</label>
                            <div class="col-md-9">
                                <input id="project_cost" type="text" class="form-control" name="project_cost" value="{{ old('project_cost') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="abstract" class="col-md-3 control-label">Abstract</label>
                            <div class="col-md-9">
                                <textarea id="abstract" class="form-control" name="abstract" rows="6" required>{{ old('abstract') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="keywords" class="col-md-3 control-label">Keywords</label>
                            <div class="col-md-9">
                                <textarea id="keywords" class="form-control" name="keywords" rows="2" required>{{ old('keywords') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="author" class="col-md-3 control-label">Author</label>
                            <div class="col-md-9">
                                <textarea id="author" class="form-control" name="author" rows="4" required>{{ old('author') }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="pub_file" class="col-md-3 control-label">Upload File</label>
                            <div class="col-md-9">
                                <input id="research_file" type="file" class="form-control" name="research_file" value="{{ old('research_file') }}" required>
                            </div>
                        </div>

                        <!-- SUBMIT -->

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection