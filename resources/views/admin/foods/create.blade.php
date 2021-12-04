@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Aggiungi il piatto</div>
                <div class="card-body">
					<form action="{{route("admin.foods.store")}}" method="POST">
						@csrf
                        {{-- Inserisci il nome --}}
						<div class="form-group">
						  <label for="name">Nome</label>
						  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Inserisci il nome" value="{{old("name")}}">
						  @error('name')
							<div class="alert alert-danger">{{ $message }}</div>
						  @enderror
						</div>
                        {{-- Inserisci l'immagine --}}
                        <div class="form-group">
                            <label for="image">Inserisci l'url l'immagine</label>
                            <input type="text" class="form-control @error('image') is-invalid @enderror" name="image" id="image" placeholder="Inserisci l'url dell'immagine" value="{{old("image")}}">
                            @error('image')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Inserisci la descrizione --}}
						<div class="form-group">
							<label for="description">Descrizione </label>
							<textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="10" placeholder="Inserisci il contenuto">{{old("description")}}</textarea>
							@error('description')
								<div class="alert alert-danger">{{ $message }}</div>
						    @enderror
						</div>
                        {{-- Allergeni --}}
						<div class="form-group">
							<label for="allergens">Allergeni </label>
							<textarea class="form-control @error('allergens') is-invalid @enderror" name="allergens" id="allergens" cols="30" rows="10" placeholder="Inserisci gli allergeni">{{old("allergens")}}</textarea>
							@error('allergens')
								<div class="alert alert-danger">{{ $message }}</div>
						    @enderror
						</div>
                        {{-- Peso --}}
                        <div class="form-group">
                            <label for="weight">Inserisci il peso in grammi</label>
                            <input type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" id="weight" placeholder="Inserisci il peso" value="{{old("weight")}}">
                            @error('weight')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Visibilità --}}
                        <div class="form-group">
                            <label for="visible">Visibilità del piatto</label>
                            <select id="visible" class="form-control" name="visible">
                              <option value="1" selected>Visibile</option>
                              <option value="0">Non visibile</option>
                            </select>
                        </div>
                        {{-- Prezzo --}}
						<div class="form-group">
                            <label for="price">Inserisci il prezzo</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="Inserisci il prezzo" value="{{old("price")}}">
                            @error('price')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

						<button type="submit" class="btn btn-primary">Crea</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection