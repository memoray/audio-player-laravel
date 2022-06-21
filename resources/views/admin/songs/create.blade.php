@extends('layouts.app')
@section('content')
    <h1>Create Song</h1>

    <x-form method="post" action="{{ route('songs.store') }}" enctype="multipart/form-data">
        @csrf
        <x-form-input type="text" class="mb-3" name="title" label="{{ __('Song') }}:" />
        <x-form-select class="mb-3" name="category_id" :options="$categories" label="{{ __('Kategorie') }}:"/>
        <x-form-select class="mb-3" name="artist_id" :options="$artists" label="{{ __('Artist') }}:" />
        <x-form-input type="file" class="mb-3" name="filename" label="{{ __('Audiodatei') }}:" />
        <x-form-input type="file" class="mb-3" name="image" label="{{ __('Bilddatei') }}:" />

        <x-form-submit class="mt-3" >{{ __('Create') }}</x-form-submit>
    </x-form>
@endsection
