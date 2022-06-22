@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Update Category</h1>

        <x-form method="put" action="{{ route('categories.update', $category) }}" >
            @csrf
            <x-form-input type="text" class="mb-3" name="name" value="{{ $category['name']}}" label="{{ __('Category') }}:" />
            <x-form-submit class="mt-3">{{ __('Update') }}</x-form-submit>
        </x-form>
    </div>
@endsection
