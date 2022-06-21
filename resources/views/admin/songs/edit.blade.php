@extends('layouts.app')
@section('content')
    <h1>Update Song</h1>

    <x-form method="put" action="{{ route('songs.update', $song) }}" >
        @csrf
        <x-form-input type="text" class="mb-3" name="name" value="{{ $song['name']}}" label="{{ __('Song') }}:" />
        <x-form-submit class="mt-3">{{ __('Update') }}</x-form-submit>
    </x-form>
@endsection
