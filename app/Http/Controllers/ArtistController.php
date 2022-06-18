<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\Response;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Artist::paginate(10);
        return view('admin.artists.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.artists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArtistRequest $request
     * @return Response
     */
    public function store(StoreArtistRequest $request)
    {
        Artist::create($request->validated());
        return redirect('/artists')->with('success', 'Artist created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Artist $artist
     * @return Response
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Artist $artist
     * @return Response
     */
    public function edit(Artist $artist)
    {
        return view('admin.artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateArtistRequest $request
     * @param Artist $artist
     * @return Response
     */
    public function update(UpdateArtistRequest $request, Artist $artist)
    {
        $artist->update($request->validated());
        return redirect('/artists')->with('success', 'Artist updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Artist $artist
     * @return Response
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect('/artists')->with('success', 'Artist deleted successfully');
    }
}
