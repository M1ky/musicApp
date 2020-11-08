@extends('layouts.app')

@section('content')
    <div>
        <table class="table" style="text-align: center">
            <thead>
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>Month</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reports as $report)
                    <tr>
                        <td>{{ $report->title }}</td>
                        <td>{{ $report->year }}</td>
                        <td>{{ $report->month }}</td>
                        <td>
                            @auth
                                <a href="/reports/{{ $report->id }}" class="btn btn-info">View</a>
                                <a href="/reports/{{ $report->id }}/createBasedOn" class="btn btn-primary">Create based on</a>
                                <a href="/reports/{{ $report->id }}/edit" class="btn btn-primary">Edit</a>
                                <a href="/reports/{{ $report->id }}/print" class="btn btn-primary">Print</a>
                                <a href="/reports/{{ $report->id }}/delete" class="btn btn-danger">Delete</a>
                            @endauth
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>

        @auth
            <a href="/reports/create" class="btn btn-success">Add a new one</a>
        @endauth
    </div>
@endsection
