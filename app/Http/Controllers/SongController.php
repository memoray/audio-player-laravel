<?php

namespace App\Http\Controllers;

use getID3;
use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Song;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    public function __construct()
    {
        $this->categories = Category::all()->keyBy('id')->map->name;
        $this->artists = Artist::all()->keyBy('id')->map->name;
        $this->getID3 = new getID3();
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
        return view('admin.songs.create', [
            'categories'=>$this->categories,
            'artists'=>$this->artists,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSongRequest $request
     * @return Response
     */
    public function store(StoreSongRequest $request)
    {
        $validated = $request->validated();

        $filename = $request->file('filename');
        if($filename) {
            $songName = $filename->hashName();
            Storage::disk('songs')->putFileAs('', $filename, $songName);
            $info = $this->getID3->analyze(storage_path('app/public/songs/'.$songName));
            $validated['filename'] = $songName;
            $validated['length']=$info['playtime_string'];
        }

        $filename = $request->file('image');
        if($filename) {
            $albumImage = $filename->hashName();
            Storage::disk('albumImages')->putFileAs('', $filename, $albumImage);
            $validated['image'] = $albumImage;
        }

        Song::create($validated);
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
        return view('admin.songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Song $song
     * @return Response
     */
    public function edit(Song $song)
    {
        return view('admin.songs.edit', [
            'categories'=>$this->categories,
            'artists'=>$this->artists,
            'song'=>$song,
        ]);
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
        $validated = $request->validated();

        $filename = $request->file('filename');
        if($filename) {
            $songName = $filename->hashName();
            Storage::disk('songs')->putFileAs('', $filename, $songName);
            $info = $this->getID3->analyze(storage_path('app/public/songs/'.$songName));
            $validated['filename']  = $songName;
            $validated['length']    = $info['playtime_string'];
        }

        $filename = $request->file('image');
        if($filename) {
            $albumImage = $filename->hashName();
            Storage::disk('albumImages')->putFileAs('', $filename, $albumImage);
            $validated['image'] = $albumImage;
        }

        $song->update($validated);
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
        die(Storage::disk('songs')->exists($song->filename));
        $song->delete();
        return redirect('/songs')->with('success', 'Song deleted successfully');
    }
}
