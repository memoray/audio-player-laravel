@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Songs</h1>
        <div class="" style="margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('songs.create') }}">
                <i class="bi bi-plus-circle-fill"></i> {{ __('Add New Song') }}
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


                <tr class="align-middle">
                    <td><img class="img" src="/storage/albumImages/{{ $song->image }}" height="80"></td>
                    <td>{{ $song->artist->name}}</td>
                    <td><a title="Lied abspielen" href="{{ route('songs.show', $song) }}">{{ $song->title}}</a></td>
                    <td>{{ $song->length}}</td>
                        <td class="text-end">
                            <x-form action="{{ route('songs.destroy', $song) }}" method="post">
                                <a class="btn btn-primary " href="{{ route('songs.edit', $song) }}"><i class="bi bi-pencil-square"></i>  <span> {{ __('Edit') }}</span></a>
                                @csrf
                                @method('delete')
                                <x-form-submit type="submit" class="btn btn-danger delsoft"><i class="bi bi-trash3-fill"></i>  {{ __('Delete') }}</x-form-submit>
                            </x-form>
                        </td>
                </tr>

            @endforeach
        </table>

        {{ $data->links() }}

    </div>
@endsection
