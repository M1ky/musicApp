<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Track;
use Exception;

class TracksController extends Controller
{
    public function index()
    {
        $tracks = $this->getAuthors();

        return view('tracks.index', [
            'tracks' => $tracks
        ]);
    }

    public function getAuthors()
    {
        $tracks = Track::latest('id')->get();
        foreach ($tracks as $track)
        {
            $this->fillTrackWithAuthorData($track);
        }
        return $tracks;
    }

    public function fillTrackWithAuthorData($track): void
    {
        $author_id = $track['author_id'];
        $author = Author::find($author_id);
        $track['author_id'] = $author['first_name'] . ' ' . $author['last_name'];

        $composer_id = $track['composer_id'];
        $composer = Author::find($composer_id);
        $track['composer_id'] = $composer['first_name'] . ' ' . $composer['last_name'];

        $author_coverage_id = $track['author_coverage_id'];
        $coverage = Author::find($author_coverage_id);
        $track['author_coverage_id'] = $coverage['first_name'] . ' ' . $coverage['last_name'];
    }

    public function create()
    {
        $authors = Author::all();

        return view('tracks.create', [
            'authors' => $authors
        ]);
    }

    public function store()
    {
        Track::create(request()->validate([
            'title' => 'required',
            'isrc' => 'required',
            'author_id' => 'required',
            'composer_id' => 'required',
            'author_coverage_id' => 'required',
            'time_seconds' => 'required',
        ]));

        return redirect('/tracks');
    }

    public function show(Track $track)
    {
        $track = $this->getAuthor($track);

        return view('tracks.show', [
            'track' => $track
        ]);
    }

    public function getAuthor(Track $track)
    {
        $this->fillTrackWithAuthorData($track);
        return $track;
    }

    public function edit(Track $track)
    {
        return view('tracks.edit', [
            'track' => $track,
            'authors' => Author::all()
        ]);
    }

    public function update(Track $track)
    {
        $validatedAttributes = request()->validate([
            'title' => 'required',
            'isrc' => 'required',
            'author_id' => 'required',
            'composer_id' => 'required',
            'author_coverage_id' => 'required',
            'time_seconds' => 'required',
        ]);

        $track->update($validatedAttributes);

        return redirect('/tracks/' . $track->id);
    }

    public function destroy(Track $track)
    {
        try
        {
            $track->delete();
        } catch (Exception $e)
        {
        }

        return redirect('/tracks');
    }

    public function delete(Track $track)
    {
        return view('tracks.delete', compact('track'));
    }
}
