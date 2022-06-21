<?php

namespace App\Http\Controllers\Api;

use App\Models\Song;
use App\Http\Controllers\Controller;
use App\Http\Resources\SongResource;
use Illuminate\Http\Response;

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
//        $data = SongResource::collection($data);
        return response()->json($data);
    }
}
