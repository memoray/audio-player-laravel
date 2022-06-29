@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/songsShow.css') }}" rel="stylesheet">
@endpush
@section('content')

<div class="player-container">
    <div class="c-player">
        <h1>Play Song</h1>

        <div class="c-player--details">
            <div class="details-img">
                <img src="/storage/albumImages/{{ $song->image }}" height="300" alt="" />
            </div>
            <h3 class="details-title">{{ $song->title}}</h3>
            <h4 class="details-artist">{{ $song->artist->name}}</h4>
        </div>
        <div class="controls" >
            <audio controls>
                <source src="/storage/songs/{{ $song->filename }}">
            </audio>
        </div>

    </div>
</div>



@endsection

