@extends('layouts.app')
@section('content')
    <div class="container">

        <h1>Artists</h1>

        <div class="col-md-12 mt-4" style="margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('artists.create') }}">
                {{ __('Add New Artist') }}
            </a>
        </div>

        {{ $data->links() }}

        <table class="table table-striped">
            @foreach($data as $artist)
                <tr class="align-middle">
                    <td>{{ $artist->name}}</td>
                    <td class="text-end">
                        <x-form action="{{ route('artists.destroy', $artist) }}" method="post">
                            <a class="btn btn-primary" href="{{ route('artists.edit', $artist) }}">{{ __('Edit') }}</a>
                            @csrf
                            @method('delete')
                            <x-form-submit type="submit" class="btn btn-danger delsoft">{{ __('Delete') }}</x-form-submit>
                        </x-form>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $data->links() }}
    </div>

@endsection
