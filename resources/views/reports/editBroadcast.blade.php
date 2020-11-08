@extends('layouts.app')

@section('content')
    @auth
        <form id="authors-create" method="POST" action="/reports/{{ $report->id }}/{{ $track->id }}/editBroadcast">
            @csrf

            <div class="form-group">
                <label for="broadcasts">Title</label>
                <input type="number" class="form-control input" id="broadcasts" name="broadcasts" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endauth
@endsection
