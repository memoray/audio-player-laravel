<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Song;
use Illuminate\Http\Response;

class SongController extends Controller
{
    public function __construct()
    {
        $this->categories = Category::all()->keyBy('id')->map->name;
        $this->artists = Artist::all()->keyBy('id')->map->name;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Song::paginate(10);
        return view('admin.songs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.songs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSongRequest $request
     * @return Response
     */
    public function store(StoreSongRequest $request)
    {
        Song::create($request->validated());
        return redirect('/songs')->with('success', 'Song created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Song $song
     * @return Response
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Song $song
     * @return Response
     */
    public function edit(Song $song)
    {
        return view('admin.songs.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSongRequest $request
     * @param Song $song
     * @return Response
     */
    public function update(UpdateSongRequest $request, Song $song)
    {
        $song->update($request->validated());
        return redirect('/songs')->with('success', 'Song updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Song $song
     * @return Response
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return redirect('/songs')->with('success', 'Song deleted successfully');
    }
}
