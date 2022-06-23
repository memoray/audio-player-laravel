@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Create Artist</h1>

        <x-form method="post" action="{{ route('artists.store') }}" >
            @csrf
            <x-form-input type="text" class="mb-3" name="name" value="" label="{{ __('Artist') }}:" />
            <x-form-submit class="mt-3" >{{ __('Create') }}</x-form-submit>
        </x-form>
    </div>
@endsection
