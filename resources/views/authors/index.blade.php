@extends('layouts.app')

@section('content')
    <div>
        <table class="table" style="text-align: center">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author->first_name }}</td>
                    <td>{{ $author->last_name }}</td>
                    <td>
                        @auth
                            <a href="/authors/{{ $author->id }}" class="btn btn-info">View</a>
                            <a href="/authors/{{ $author->id }}/edit" class="btn btn-primary">Edit</a>
                            <a href="/authors/{{ $author->id }}/delete" class="btn btn-danger">Delete</a>
                        @endauth
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @auth
            <a href="/authors/create" class="btn btn-success">Add a new one</a>
        @endauth
    </div>
@endsection
