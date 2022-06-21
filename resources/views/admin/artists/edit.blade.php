@extends('layouts.app')
@section('content')
    <h1>Update Artist</h1>

    <x-form method="put" action="{{ route('artists.update', $artist) }}" >
        @csrf
        <x-form-input type="text" class="mb-3" name="name" value="{{ $artist['name']}}" label="{{ __('Artist') }}:" />
        <x-form-submit class="mt-3">{{ __('Update') }}</x-form-submit>
    </x-form>
@endsection
