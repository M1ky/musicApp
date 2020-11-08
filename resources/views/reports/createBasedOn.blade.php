@extends('layouts.app')

@section('content')
    @auth
    <form id="authors-create" method="POST" action="/reports">
        @csrf

        <h1>Create based on Report</h1>
        <div class="form-group">
            <label for="track_id">Track</label>
            <select id="track_id" name="track_ids[]" multiple>
                @foreach ($tracks as $item)
                    <option value="{{ $item->id }}" {{ in_array($item->id, $ids) ? "selected='selected'" : "" }}>
                        {{ $item->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control input" id="title" name="title" value="{{ $report->title }}">
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control input" id="year" name="year" value="{{ $report->year }}">
        </div>
        <div class="form-group">
            <label for="month">Month</label>
            <input type="number" class="form-control input" id="month" name="month" value="{{ $report->month }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endauth
@endsection
