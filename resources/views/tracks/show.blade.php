@extends('layouts.app')

@section('content')
    @auth
    <form id="track-create" method="POST" action="/tracks">
        @csrf
        <h1>Track</h1>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control input" id="title" name="title" value="{{ $track->title }}" disabled>
        </div>
        <div class="form-group">
            <label for="isrc">ISRC</label>
            <input type="text" class="form-control input" id="isrc" name="isrc" value="{{ $track->isrc }}" disabled>
        </div>
        <div class="form-group">
            <label for="author_id">Author</label>
            <input type="text" class="form-control input" id="author_id" name="author_id" value="{{ $track->author_id }}" disabled>
        </div>
        <div class="form-group">
            <label for="composer_id">Composer</label>
            <input type="text" class="form-control input" id="composer_id" name="composer_id" value="{{ $track->composer_id }}" disabled>
        </div>
        <div class="form-group">
            <label for="author_coverage_id">Coverage</label>
            <input type="text" class="form-control input" id="author_coverage_id" name="author_coverage_id" value="{{ $track->author_coverage_id }}" disabled>
        </div>
        <div class="form-group">
            <label for="time_seconds">Time (in seconds)</label>
            <input type="number" class="form-control input" id="time_seconds" name="time_seconds" value="{{ $track->time_seconds }}" disabled>
        </div>
    </form>
    @endauth
@endsection
