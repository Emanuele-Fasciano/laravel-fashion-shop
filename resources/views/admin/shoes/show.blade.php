@extends('layouts.app')

@section('title', 'Dettagli prodotto')

@section('content')
    <a class="btn btn-primary my-3" href="{{ route('admin.shoes.index') }}">Torna alla lista</a>

    <div class="row">
        <div class="card">
            <div class="card-body my-2">
                <div class="row justify-content-center align-items-center">
                    <div class="col-8">
                        <h5 class="card-title my-2"><strong>Marca:</strong> {{ $shoe->marca }}</h5>
                        <h6 class="card-subtitle mb-2 my-2"><strong> Modello: </strong>
                            {{ $shoe->modello }}
                        </h6>
                        <h6 class="card-subtitle mb-2 my-2"><strong> Colore:</strong> {{ $shoe->colore }}</h6>
                        <h6 class="card-subtitle mb-2 my-2"><strong> Taglia:</strong> {{ $shoe->taglia }}</h6>
                        <h6 class="card-subtitle mb-2 my-2"><strong> Prezzo:</strong> € {{ $shoe->prezzo }}</h6>
                        <h6 class="card-subtitle mb-2 my-2"><strong> Costo:</strong> € {{ $shoe->costo }}</h6>
                        <h6 class="card-subtitle mb-2 my-2"><strong> Genere:</strong> {{ $shoe->genere }}</h6>
                    </div>
                    <div class="col-3">
                        <img src="{{ $shoe->image }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
