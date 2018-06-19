@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Upload Research</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('author.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Title</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alttitle" class="col-md-4 control-label">Alternate Title</label>
                            <div class="col-md-6">
                                <input id="alttitle" type="text" class="form-control" name="alttitle" value="{{ old('alttitle') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="abstract" class="col-md-4 control-label">Abstract</label>
                            <div class="col-md-6">
                                <textarea id="abstract" class="form-control" name="abstract" rows="6" required>{{ old('abstract') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="keywords" class="col-md-4 control-label">Keywords</label>
                            <div class="col-md-6">
                                <textarea id="keywords" class="form-control" name="keywords" rows="2" required>{{ old('keywords') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="author" class="col-md-4 control-label">Author</label>
                            <div class="col-md-6">
                                <textarea id="author" class="form-control" name="author" rows="4" required>{{ old('author') }}</textarea>
                            </div>
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="pub_type" class="col-md-4 control-label">Publication type</label>
                            <div class="col-md-6">
                                <textarea id="pub_type" class="form-control" name="pub_type" rows="2" required>{{ old('pub_type') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pub_date" class="col-md-4 control-label">Publication date</label>
                            <div class="col-md-6">
                                <input id="pub_date" type="text" class="form-control" name="pub_date" value="{{ old('pub_date') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pub_pages" class="col-md-4 control-label">Pages</label>
                            <div class="col-md-6">
                                <input id="pub_pages" type="number" class="form-control" name="pub_pages" value="{{ old('pub_pages') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pub_file" class="col-md-4 control-label">File</label>
                            <div class="col-md-6">
                                <input id="pub_file" type="file" class="form-control" name="pub_file" value="{{ old('pub_file') }}" required>
                            </div>
                        </div>

                        <!-- SUBMIT -->

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
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