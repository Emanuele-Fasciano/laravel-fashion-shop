@extends('layouts.app')

@section('title', 'Lista prodotti')

@section('content')
		<table class="table table-striped">
				<a class="btn btn-primary my-3" href="{{ route('admin.shoes.create') }}">Aggiungi prodotto</a>
				<thead>
						<tr>
								<th scope="col"><a
												href="{{ route('admin.shoes.index') }}?sort=id&order=@if ($sort == 'id' && $order != 'DESC') DESC @else ASC @endif">ID
												@if ($sort == 'id')
														<i class="bi bi-arrow-down d-inline-block @if ($order == 'DESC') rotate-180 @endif"></i>
												@endif
										</a>
								</th>
								<th scope="col"><a
												href="{{ route('admin.shoes.index') }}?sort=marca&order=@if ($sort == 'marca' && $order != 'DESC') DESC @else ASC @endif">Marca
												@if ($sort == 'marca')
														<i class="bi bi-arrow-down d-inline-block @if ($order == 'DESC') rotate-180 @endif"></i>
												@endif
										</a>
								</th>
								<th scope="col"><a
												href="{{ route('admin.shoes.index') }}?sort=modello&order=@if ($sort == 'modello' && $order != 'DESC') DESC @else ASC @endif">Modello
												@if ($sort == 'modello')
														<i class="bi bi-arrow-down d-inline-block @if ($order == 'DESC') rotate-180 @endif"></i>
												@endif
										</a>
								</th>
								<th scope="col"><a
												href="{{ route('admin.shoes.index') }}?sort=colore&order=@if ($sort == 'colore' && $order != 'DESC') DESC @else ASC @endif">Colore
												@if ($sort == 'colore')
														<i class="bi bi-arrow-down d-inline-block @if ($order == 'DESC') rotate-180 @endif"></i>
												@endif
										</a>
								</th>
								<th scope="col"><a
												href="{{ route('admin.shoes.index') }}?sort=taglia&order=@if ($sort == 'taglia' && $order != 'DESC') DESC @else ASC @endif">Taglia
												@if ($sort == 'taglia')
														<i class="bi bi-arrow-down d-inline-block @if ($order == 'DESC') rotate-180 @endif"></i>
												@endif
										</a>
								</th>
								<th scope="col"><a
												href="{{ route('admin.shoes.index') }}?sort=prezzo&order=@if ($sort == 'prezzo' && $order != 'DESC') DESC @else ASC @endif">Prezzo
												@if ($sort == 'prezzo')
														<i class="bi bi-arrow-down d-inline-block @if ($order == 'DESC') rotate-180 @endif"></i>
												@endif
										</a>
								</th>
								<th scope="col"><a
												href="{{ route('admin.shoes.index') }}?sort=costo&order=@if ($sort == 'costo' && $order != 'DESC') DESC @else ASC @endif">Costo
												@if ($sort == 'costo')
														<i class="bi bi-arrow-down d-inline-block @if ($order == 'DESC') rotate-180 @endif"></i>
												@endif
										</a>
								</th>
								<th scope="col"><a
												href="{{ route('admin.shoes.index') }}?sort=genere&order=@if ($sort == 'genere' && $order != 'DESC') DESC @else ASC @endif">Genere
												@if ($sort == 'genere')
														<i class="bi bi-arrow-down d-inline-block @if ($order == 'DESC') rotate-180 @endif"></i>
												@endif
										</a>

								</th>
								<th scope="col">Azioni</th>

						</tr>
				</thead>
				<tbody>
						@foreach ($shoes as $shoe)
								<tr>

										<th scope="row">{{ $shoe->id }}</th>
										<td>{{ $shoe->marca }}</td>
										<td>{{ $shoe->modello }}</td>
										<td>{{ $shoe->colore }}</td>
										<td>{{ $shoe->taglia }}</td>
										<td>{{ $shoe->prezzo }}</td>
										<td>{{ $shoe->costo }}</td>
										<td>{{ $shoe->genere }}</td>
										<td>
												<a href={{ route('admin.shoes.show', $shoe) }} class="action-icon">
														<i class=" bi bi-eye mx-2"></i>
												</a>
												<a href={{ route('admin.shoes.edit', $shoe) }} class="action-icon">
														<i class="bi bi-pencil mx-2"></i>
												</a>

												<a type="button" class="text-danger" data-bs-toggle="modal"
														data-bs-target="#delete-modal-{{ $shoe->id }}">
														<i class="bi bi-trash mx-2"></i>
												</a>
												@foreach ($shoes as $shoe)
														<!-- Modal -->
														<div class="modal fade" id="delete-modal-{{ $shoe->id }}" tabindex="-1"
																aria-labelledby="delete-modal-{{ $shoe->id }}-label" aria-hidden="true">
																<div class="modal-dialog">
																		<div class="modal-content">
																				<div class="modal-header">
																						<h1 class="modal-title fs-5" id="delete-modal-{{ $shoe->id }}-label">
																								Conferma eliminazione</h1>
																						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																				</div>
																				<div class="modal-body text-start">
																						Sei sicuro di voler eliminare l'articolo
																						<strong>{{ $shoe->marca }} - {{ $shoe->modello }}</strong>
																						<br>
																						L'operazione non è reversibile
																				</div>
																				<div class="modal-footer">
																						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

																						<form action="{{ route('admin.shoes.destroy', $shoe) }}" method="POST" class="">
																								@method('DELETE')
																								@csrf

																								<button type="submit" class="btn btn-danger">Elimina</button>
																						</form>
																				</div>
																		</div>
																</div>
														</div>
												@endforeach
										</td>
								</tr>
						@endforeach
				</tbody>
		</table>
		{{ $shoes->links('pagination::bootstrap-5') }}
@endsection
{{-- @endsection --}}
