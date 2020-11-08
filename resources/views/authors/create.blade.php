@extends('layouts.app')

@section('content')
    @auth
    <form id="authors-create" method="POST" action="/authors">
        @csrf
        <h1>Create new Author</h1>
        <div class="form-group">
            <label for="first-name">First Name</label>
            <input type="text" class="form-control input" id="first-name" name="first_name">
        </div>
        <div class="form-group">
            <label for="last-name">Last Name</label>
            <input type="text" class="form-control input" id="last-name" name="last_name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endauth
@endsection
