@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="myFile">Update Song</h1>

        <x-form action="{{ route('songs.update', $song) }}" enctype="multipart/form-data">
            @method('put')
                @bind($song)
                    <x-form-input type="text" class="mb-3" name="title" label="{{ __('Song') }}:" />
                    <x-form-select class="mb-3" name="category_id" :options="$categories" label="{{ __('Kategorie') }}:"/>
                    <x-form-select class="mb-3" name="artist_id" :options="$artists" label="{{ __('Artist') }}:" />
                <div class="fw-bold mb-2">
                    <span class="myFile">Vorhandene Datei: </span> {{$song->artist->name}} - {{$song->title}}
                </div>
                    <x-form-input type="file" class="mb-3" name="filename" label="{{ __('Audiodatei') }}:" />
                <div class="mb-2">
                    <img class="img" src="/storage/albumImages/{{ $song->image }}" height="80">
                </div>
                    <x-form-input type="file" class="mb-3" name="image" label="{{ __('Bilddatei') }}:" />

                @endbind
                <x-form-submit class="mt-3">{{ __('Update') }}</x-form-submit>
                </x-form>
                </div>
                @endsection
