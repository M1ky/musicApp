@extends('layouts.app')

@section('content')
    <div>
        <table class="table" style="text-align: center">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>ISRC</th>
                    <th>Author</th>
                    <th>Composer</th>
                    <th>Coverage</th>
                    <th>Time</th>
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
                        <td>
                            @auth
                                <a href="/tracks/{{ $track->id }}" class="btn btn-info">View</a>
                                <a href="/tracks/{{ $track->id }}/edit" class="btn btn-primary">Edit</a>
                                <a href="/tracks/{{ $track->id }}/delete" class="btn btn-danger">Delete</a>
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        @auth
            <a href="/tracks/create" class="btn btn-success">Add a new one</a>
        @endauth
    </div>
@endsection
