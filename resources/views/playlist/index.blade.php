@extends('layouts/app')
@section('css')
    <style>
        .card-footer {
            justify-content: center;
            align-items: center;
            padding: 0.4em;
        }
        select, .is-info {
            margin: 0.3em;
        }
    </style>

@endsection
@section('content')
@if(session()->has('info'))
<div class="notification is-success">
    {{ session('info') }}
</div>
@endif

<div class="card" style="width:100%">
    <header class="card-header">
        <p class="card-header-title">Mes Playlists</p>
        <div class="select">
            <select onchange="window.location.href = this.value">
                <option value="{{ route('playlist.index') }}" @unless($titremus) selected @endunless>Tous les musiques</option>
                @foreach($musiques as $musique)
                    <option value="{{ route('playlist.musique', $musique->titremus) }}"
                        {{ $titremus == $musique->titremus ? 'selected' : '' }}>{{ $musique->titremus }}</option>
                @endforeach
            </select>

            </div>
        </div>
        <a class="button is-info" href="{{ route('playlist.create') }}">Créer une playlist</a>
    </header>
    <div class="card-content">


            <table class="table is-hoverable" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom de la playlist</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($playlists as $playlist)
                    <tr>
                        <td>{{ $playlist->id }}</td>
                        <td><strong>{{ $playlist->titreplay}}</strong></td>
                        <td><a class="button is-primary" href="{{ route('playlist.show', $playlist->id) }}">Voir</a></td>
                        <td><a class="button is-warning" href="{{ route('playlist.edit', $playlist->id) }}">Modifier</a></td>
                        <td>
                            <form action="{{ route('playlist.destroy', $playlist->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="button is-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </div>
    <footer class="card-footer">

    </footer>
</div>
@endsection
