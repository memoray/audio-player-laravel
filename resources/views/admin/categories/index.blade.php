@extends('layouts.app')
@section('content')
    <h1>Category</h1>

    <div class="col-md-12 text-end mt-4" style="margin-bottom: 10px;">
        <a class="btn btn-primary" href="{{ route('categories.create') }}">
            {{ __('Add New Category') }}
        </a>
    </div>

    {{ $data->links() }}

    <table class="table table-striped">
        @foreach($data as $category)
            <tr>
                <td>{{ $category->name}}</td>
                <td>
                    <x-form action="{{ route('categories.destroy', $category) }}" method="post">
                        <a class="btn btn-primary" href="{{ route('categories.edit', $category) }}">{{ __('Edit') }}</a>
                        @csrf
                        @method('delete')
                        <x-form-submit type="submit" class="btn btn-danger delsoft">{{ __('Delete') }}</x-form-submit>
                    </x-form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $data->links() }}
@endsection
