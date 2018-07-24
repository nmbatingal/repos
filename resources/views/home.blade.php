@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form action="{{ url('search') }}" method="get">
                        <div class="form-group">
                            <input
                                type="text"
                                name="q"
                                class="form-control"
                                placeholder="Search..."
                                value="{{ request('q') }}"
                            />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Articles <small>({{ $records->count() }})</small></div>

                <div class="panel-body">
                    @forelse($records as $record)
                        <article>
                            <h2>{{ $record->title }}</h2>

                            <p>{{ $record->abstract }}</p>
                            <p>
                                <a href="{{ asset('storage/users/'.$record->created_by_id.'/research/'.$record->id.'/'.$record->filename) }}">
                                   {{ $record->filename }}
                                </a>
                            </p>
                            <p class="well">{{ $record->keywords }}</p>
                        </article>
                    @empty
                        <p>No articles found</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{ $records->render() }}
</div>
@endsection
