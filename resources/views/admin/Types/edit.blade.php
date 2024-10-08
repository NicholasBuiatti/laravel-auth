@extends('layouts.NavAdmin')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<h1 class="mb-4">Stai modificando il metodo di lavoro: {{ $type->name }}</h1>

			<div class="col-md-12">
				{{-- INDIVITUO SE Cè UN ERRORE E SE C'è LO STAMPO A SCHERMO --}}
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul class="mb-0">
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
			</div>

			<div class="mb-3">
				<form action="{{ route('admin.type.update', $type) }}" method="POST">
					@csrf
					@method('PATCH')
					<div class="row">
						<div class="col-6">
							<label class="form-label">Nome:</label>
							<input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $type->name }}"
								required>
							@error('name')
								<div class="form-text text-danger">{{ $message }}</div>
							@enderror
						</div>

						<div class="col-3">
							<label class="form-label">Classe di FA:</label>
							<input class="form-control" name="icon" value="{{ $type->icon }}">
						</div>
					</div>

					<div class="mb-3 col-9">
						<label class="form-label">Descrizione:</label>
						<textarea class="form-control" name="description" rows="3">{{ old('description', $type->description) }}</textarea>
					</div>

					<div class="mb-3">
						<a href="{{ route('admin.type.index') }}" class="btn btn-primary">Annulla</a>
						<button type="submit" class="btn btn-primary">Salva</a>
					</div>

				</form>
			</div>

		</div>
	</div>
@endsection
