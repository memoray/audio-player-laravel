<?php

namespace App\Http\Controllers\Api;

use App\Models\Song;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\SongResource;

class ApiSongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Song::with(['artist','category'])->get();
        $data = SongResource::collection($data);
        return response()->json($data);
    }
}
