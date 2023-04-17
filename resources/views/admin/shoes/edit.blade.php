@extends('layouts.app')

@section('title', 'Modifica prodotto')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.shoes.update', $shoe) }}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">

                            <label for="marca">marca</label>
                            <input type="text" name="marca" id="marca"
                                class="form-control  @error('marca') is-invalid @enderror"
                                value="{{ old('marca') ?? $shoe->marca }}">
                            @error('marca')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <label for="modello" class="mt-3">modello</label>
                            <input type="text" name="modello" id="modello"
                                class="form-control @error('modello') is-invalid @enderror"
                                value="{{ old('modello') ?? $shoe->modello }}">
                            @error('modello')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <label for="colore" class="mt-3">colore</label>
                            <input type="text" name="colore" id="colore"
                                class="form-control @error('colore') is-invalid @enderror"
                                value="{{ old('colore') ?? $shoe->colore }}">
                            @error('colore')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <label for="genere" class="mt-3">genere</label>
                            <select name="genere" id="genere" class="form-select">

                                <option value="uomo" {{ old('genere') == 'uomo' ? 'selected' : '' }}>uomo</option>
                                <option value="donna" {{ old('genere') == 'donna' ? 'selected' : '' }}>donna</option>
                                <option value="bambino" {{ old('genere') == 'bambino' ? 'selected' : '' }}>bambino</option>
                                <option value="bambina" {{ old('genere') == 'bambina' ? 'selected' : '' }}>bambina</option>

                            </select>
                        </div>
                        <div class="col-6">
                            <label for="taglia">taglia</label>
                            <input type="number" name="taglia" id="taglia"
                                class="form-control @error('taglia') is-invalid @enderror"
                                value="{{ old('taglia') ?? $shoe->taglia }}">
                            @error('taglia')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <label for="prezzo" class="mt-3">prezzo</label>
                            <input type="number" name="prezzo" id="prezzo"
                                class="form-control @error('prezzo') is-invalid @enderror"
                                value="{{ old('prezzo') ?? $shoe->prezzo }}">
                            @error('prezzo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <label for="costo" class="mt-3">costo</label>
                            <input type="number" name="costo" id="costo"
                                class="form-control @error('costo') is-invalid @enderror"
                                value="{{ old('costo') ?? $shoe->costo }}">
                            @error('costo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <label for="image" class="mt-3">image</label>
                            <input type="text" name="image" id="image"
                                class="form-control  @error('image') is-invalid @enderror"
                                value="{{ old('image') ?? $shoe->image }}">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Salva">
                    <a class="btn btn-secondary my-3" href="{{ route('admin.shoes.index') }}">Annulla</a>

                </form>
            </div>
        </div>
    </div>
@endsection
