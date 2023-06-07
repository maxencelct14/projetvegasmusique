@extends('template')
@section('contenu')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Modification de la playlist</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form class="form-horizontal" method="POST" action="{{ route('playlist.update', $playlist->id) }}">
                {{ csrf_field() }}

                {{ method_field('PUT') }}


                <div class="field">
                    <label class="label">Musiques</label>
                    <div class="select is-multiple">
                        <select name="perss[]" multiple>
                            @foreach($musiques as $musique)
                                <option value="{{ $musique->id }}" {{ in_array($musique->id, old('perss') ?: $playlist->musiques->pluck('id')->all()) ? 'selected' : '' }}>{{ $musique->titremus }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Notes des musiques</label>
                    <div class="select is-multiple">
                        <select name="perss[]" multiple>
                            @foreach($musiques as $musique)
                                <option value="{{ $musique->id }}" {{ in_array($musique->id, old('perss') ?: $playlist->musiques->pluck('id')->all()) ? 'selected' : '' }}>{{ $musique->notemus }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field">
                    <label for="titreplay" class="label">Titre de la playlist</label>

                    <div class="control">
                        <input  id="titreplay" name="titreplay" placeholder="Titre de la playlist" value="{{ old('titreplay',$playlist->titreplay) }}">
                    </div>
                    @error('titreplay')
                    <p class="help is-danger">Le titre de la playlist est incorrect</p>
                    @enderror

                </div>


                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">
                            Enregistrer
                        </button>
                        <a class="button is-info" href="{{ route('playlist.index') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
