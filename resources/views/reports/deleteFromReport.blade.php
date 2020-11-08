@extends('layouts.app')

@section('content')
    @auth
    <form id="authors-create" method="POST" action="/reports/{{ $report->id }}/{{ $track->id }}/delete">
        @csrf
        @method('DELETE')

        <h1>Are you sure?</h1>

        <button type="submit" class="btn btn-danger">Submit</button>
    </form>
    @endauth
@endsection
