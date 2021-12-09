@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul>
                @foreach ($foods as $food)
                <li>{{$food["name"]}}</li>
                {{-- test-image --}}
                <div>
                    <img src="{{  asset('storage/' .  $food['image'])}}" alt="">
                </div>
                {{-- /test-image --}}
                <a href="{{route('admin.foods.show', $food["id"])}}"><button class="btn btn-primary">Visualizza</button></a>
                {{-- <form action="{{route('admin.foods.destroy', $food["id"])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-delete">
                        Delete
                    </button>
                </form> --}}
                <a href="{{route('admin.foods.edit', $food["id"])}}">
                    <button type="button" class="btn btn-warning">Modifica</button>
                </a>
                {{-- delete button modale --}}
                <button type="button" class="btn btn-danger btn-delete" data-id="{{$food["id"]}}" data-toggle="modal" data-target="#deleteModal">
                    Elimina 
                </button>
                @endforeach
            </ul>
            <a href="{{route('admin.foods.create')}}" class="mt-10">
                <button type="button" class="btn btn-primary">Nuovo piatto</button>
            </a>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Conferma cancellazione Piatto</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="{{route("admin.foods.destroy", 'id')}}" method="POST">
			@csrf
			@method("DELETE")
			<input type="hidden" id="delete-id" name="food_id">
			<div class="modal-body">
				Sei sicuro di voler cancellare il piatto?
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Si</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
			</div>
		</form>
		</div>
	</div>
</div>

@endsection
