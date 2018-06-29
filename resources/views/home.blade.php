@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Records List</div>

                <div class="panel-body"><table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($records as $record)
                        <tr>
                          <th scope="row"></th>
                          <td>{{ $record->title }}</td>
                          <td>
                            <a href="{{ asset('storage/users/'.$record->created_by_id.'/research/'.$record->id.'/'.$record->filename) }}">
                              {{ $record->filename }}
                            </a>
                            
                          </td>
                          <td></td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
