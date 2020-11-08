@extends('layouts.app')

@section('content')
    @auth
    <form id="authors-create" method="POST" action="/authors/{{ $author->id }}">
        @csrf
        @method('DELETE')

        <h1>Delete Author</h1>
        <div class="form-group">
            <label for="first-name">First Name</label>
            <input type="text" class="form-control" id="first-name" value="{{ $author->first_name }}" name="first_name" disabled>
        </div>
        <div class="form-group">
            <label for="last-name">Last Name</label>
            <input type="text" class="form-control" id="last-name" value="{{ $author->last_name }}" name="last_name" disabled>
        </div>
        <button type="submit" class="btn btn-primary alert-danger">Delete</button>
    </form>
    @endauth
@endsection
