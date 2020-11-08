<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('authors.index', [
            'authors' => Author::latest('id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store()
    {
        Author::create(request()->validate([
            'first_name' => 'required',
            'last_name' => 'required'
        ]));

        return redirect('/authors');
    }

    /**
     * Display the specified resource.
     *
     * @param Author $author
     * @return Response
     */
    public function show(Author $author)
    {
       return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Author $author
     * @return Response
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Author $author
     * @return Response
     */
    public function update(Author $author)
    {
        $validatedAttributes = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required'
        ]);

        $author->update($validatedAttributes);

        return redirect('/authors/' . $author->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return Response
     */
    public function destroy(Author $author)
    {
        try
        {
            $author->delete();
        } catch (\Exception $e)
        {
        }

        return redirect('/authors');
    }

    public function delete(Author $author)
    {
        return view('authors.delete', compact('author'));
    }
}
