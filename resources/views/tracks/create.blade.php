@extends('layouts.app')

@section('content')
    @auth
    <form id="track-create" method="POST" action="/tracks">
        @csrf
        <h1>Create new Track</h1>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control input" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="isrc">ISRC</label>
            <input type="text" class="form-control input" id="isrc" name="isrc">
        </div>
        <div class="form-group">
            <label for="author_id">Author</label>
            <select id="author_id" name="author_id">
                @foreach ($authors as $item)
                    <option value="{{ $item['id'] }}" >
                        {{ $item['first_name'] . ' ' . $item['last_name']}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="composer_id">Composer</label>
            <select id="composer_id" name="composer_id">
                @foreach ($authors as $item)
                    <option value="{{ $item['id'] }}" >
                        {{ $item['first_name'] . ' ' . $item['last_name']}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="author_coverage_id">Coverage</label>
            <select id="author_coverage_id" name="author_coverage_id">
                @foreach ($authors as $item)
                    <option value="{{ $item['id'] }}" >
                        {{ $item['first_name'] . ' ' . $item['last_name']}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="time_seconds">Time (in seconds)</label>
            <input type="number" class="form-control input" id="time_seconds" name="time_seconds">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endauth
@endsection
