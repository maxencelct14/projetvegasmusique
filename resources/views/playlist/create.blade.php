@extends('template')
@section('contenu')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Création d'une playlist</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form action="{{ route('playlist.store') }}" method="POST">
                @csrf

                    <div class="field">
                        <label class="label">Musiques</label>
                        <div class="select is-multiple">
                            <select name="perss[]" multiple>
                                @foreach($musiques as $musique)
                                    <option value="{{ $musique->id }}" {{ in_array($musique->id, old('perss') ?: []) ? 'selected' : '' }}>{{ $musique->titremus }}</option>
                                @endforeach
                            </select>
                        </div>

                </div>
                @error('perss')
                <p class="help is-danger">{{$message}}</p>
                @enderror

                <div class="field">
                    <label class="label">Note de la musique</label>
                    <div class="select is-multiple">
                        <select name="perss[]" multiple>
                            @foreach($musiques as $musique)
                                <option value="{{ $musique->id }}" {{ in_array($musique->id, old('perss') ?: []) ? 'selected' : '' }}>{{ $musique->notemus }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('notemus')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label">Nom de la playlist</label>
                    <div class="control">
                        <input type="text" size="100" name="titreplay" placeholder="Titre de la playlist" value="{{ old('titreplay') }}">
                    </div>
                    @error('titreplay')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>


                <div class="field">
                    <div class="control">
                        <button class="button is-link">Envoyer</button>

                        <a class="button is-info" href="{{ route('playlist.index') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
