@extends('layouts.app')

@section('content')
    @auth
    <form id="track-create" method="POST" action="/reports/{{ $report->id }}">
        @csrf
        @method('DELETE')

        <h1>Track</h1>

        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>ISRC</th>
                <th>Author</th>
                <th>Composer</th>
                <th>Coverage</th>
                <th>Time (in seconds)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($report->tracks as $track)
                <tr>
                    <td>{{ $track->title }}</td>
                    <td>{{ $track->isrc }}</td>
                    <td>{{ $track->author_id }}</td>
                    <td>{{ $track->composer_id }}</td>
                    <td>{{ $track->author_coverage_id }}</td>
                    <td>{{ $track->time_seconds }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary alert-danger">Delete</button>
    </form>
    @endauth
@endsection
