@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Play Songs</h1>
        <table class="songTitle">
            <tr>
                <th >Artist</th>
                <td>{{ $song->artist->name}}</td>
            </tr>
            <tr>
                <th>Song Title</th>
                <td>{{ $song->title}}</td>
            </tr>
        </table>
        <div class="player">
            <img class="img" src="/storage/albumImages/{{ $song->image }}" height="300">
        </div>
        <div>
            <audio controls>
                  <source src="/storage/songs/{{ $song->filename }}">
            </audio>
        </div>
    </div>


@endsection
