@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Add Song</h1>

        <x-form method="post" action="{{ route('songs.store') }}" enctype="multipart/form-data">
            <x-form-input type="text" class="mb-3" name="title" label="{{ __('Song') }}:" />
            <x-form-select class="mb-3" name="category_id" :options="$categories" label="{{ __('Kategorie') }}:"/>
            <x-form-select class="mb-3" name="artist_id" :options="$artists" label="{{ __('Artist') }}:" />
            <x-form-input type="file" class="mb-3" name="filename" label="{{ __('Audiodatei') }}:" />
            <x-form-input type="file" class="mb-3" name="image" label="{{ __('Bilddatei') }}:" />

            <x-form-submit class="mt-3" ><i class="bi bi-plus-circle-fill"></i> {{ __('Add') }}</x-form-submit>
        </x-form>
    </div>
@endsection
