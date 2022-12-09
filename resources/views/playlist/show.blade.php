    @extends('template')
    @section('contenu')
        <div class="card">
            <header class="card-header">
                <p class="card-header-title"><strong>Nom de la playlist</strong>  : {{ $playlist->titreplay }}</p>
            </header>
            <div class="card-content">
                <div class="content">

                    <p>Musiques :</p>
                    <ul>
                        @foreach($playlist->musiques as $musique)
                            <li>{{ $musique->titremus }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <footer class="card-footer is-centered">
            <a class="button is-info" href="{{ route('playlist.index') }}">Retour à la liste</a>
        </footer>
        </div>
    @endsection
