@extends('layouts.app')

@section('content')
    @auth
    <form id="track-create" method="POST" action="/tracks">
        @csrf

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
                    <th>Broadcasts</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tracks as $track)
                <tr>
                    <td>{{ $track->title }}</td>
                    <td>{{ $track->isrc }}</td>
                    <td>{{ $track->author_id }}</td>
                    <td>{{ $track->composer_id }}</td>
                    <td>{{ $track->author_coverage_id }}</td>
                    <td>{{ $track->time_seconds }}</td>
                    <td>{{ $track->broadcasts }}</td>
                    <td>
                        <a href="/reports/{{ $report->id }}/{{ $track->id }}/editBroadcast" class="btn btn-primary">Edit Broadcast Nr</a>
                        <a href="/reports/{{ $report->id }}/{{ $track->id }}/delete" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </form>
    @endauth
@endsection
