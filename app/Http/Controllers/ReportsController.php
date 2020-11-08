<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Track;
use App\Models\Author;
use App\Models\ReportTrack;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
    {
        return view('reports.index', [
            'reports' => Report::latest('id')->get()
        ]);
    }

    public function create()
    {
        $tracks = Track::all();
        return view('reports.create', [
            'tracks' => $tracks
        ]);
    }

    public function store()
    {
        $id = Report::max('id') +1;
        $report = new Report();
        $report->id = $id;
        $report->title = request('title');
        $report->year = request('year');
        $report->month = request('month');

        $report->save();
        $report->tracks()->attach(request('track_ids'));

        return redirect('/reports');
    }

    public function show(Report $report)
    {
        $tracks = $report->tracks;
        $track_class = new TracksController();
        foreach ($tracks as $track)
        {
            $track_class->fillTrackWithAuthorData($track);
            $report_track = ReportTrack::where('report_id', $report->id)->where('track_id', $track->id)->firstOrFail();
            $track->setAttribute('broadcasts',$report_track['broadcasts']);
        }

        return view('reports.show', [
            'report' => $report,
            'tracks' => $tracks
        ]);
    }

    public function edit(Report $report)
    {
        $ids = array();
        foreach ($report->tracks as $track)
        {
            array_push($ids, $track->id);
        }

        return view('reports.edit', [
            'report' => $report,
            'tracks' => Track::all(),
            'ids' => $ids
        ]);
    }

    public function update(Request $request, Report $report)
    {
        $report->title = request('title');
        $report->year = request('year');
        $report->month = request('month');

        $report->tracks()->detach();
        $report->save();
        $report->tracks()->attach(request('track_ids'));

        return redirect('/reports/' . $report->id);
    }

    public function destroy(Report $report)
    {
        try
        {
            $report->tracks()->detach();
            $report->delete();
        } catch (Exception $e)
        {
        }

        return redirect('/reports');
    }

    public function delete(Report $report)
    {
        return view('reports.delete', compact('report'));
    }

    public function createBasedOn(Report $report)
    {
        $ids = array();
        foreach ($report->tracks as $track)
        {
            array_push($ids, $track->id);
        }

        return view('reports.createBasedOn', [
            'report' => $report,
            'tracks' => Track::all(),
            'ids' => $ids
        ]);
    }

    public function getDeleteTrackFromReportView(Report $report, Track $track)
    {
        return view('reports.deleteFromReport', [
            'report' => $report,
            'track' => $track
        ]);
    }

    public function deleteTrackFromReport(Report $report, Track $track)
    {
        try
        {
            $report->tracks()->detach($track->id);
        } catch (Exception $e)
        {
        }

        return redirect('/reports/' . $report->id);
    }

    public function print(Report $report)
    {
        return view('reports.print', [
            'report' => $report
        ]);
    }

    public function getEditBroadcast(Report $report, Track $track)
    {
        return view('reports.editBroadcast', [
            'report' => $report,
            'track' => $track
        ]);
    }

    public function editBroadcast(Report $report, Track $track)
    {
        DB::table('report_track')
            ->where('report_id', $report->id)
            ->where('track_id', $track->id)
            ->update(['broadcasts' => request('broadcasts')]);

        return redirect('/reports');
    }
}
