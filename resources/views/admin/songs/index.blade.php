@extends('layouts.app')
@section('content')
    <div class="container>
        <h1>Songs</h1>
        <div class="" style="margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('songs.create') }}">
                {{ __('Add New Song') }}
            </a>
        </div>


        {{ $data->links() }}

        <table class="table table-striped">
                <tr>
                    <td>Album</td>
                    <td>Artist</td>
                    <td>Song</td>
                    <td>Dauer</td>
                    <td></td>
                </tr>
            @foreach($data as $song)
                <tr>
                    <td><img class="img" src="/storage/albumImages/{{ $song->image }}" height="80"></td>
                    <td>{{ $song->artist->name}}</td>
                    <td><a href="{{ route('songs.show', $song) }}"> {{ $song->title}} </a></td>
                    <td>{{ $song->length}}</td>
                        <td>
                            <x-form action="{{ route('songs.destroy', $song) }}" method="post">
                                <a class="btn btn-primary " href="{{ route('songs.edit', $song) }}">{{ __('Edit') }}</a>
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
