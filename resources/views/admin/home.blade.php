@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col">
                <a href="{{route('admin.foods.create')}}" class="mt-10">
                    <button type="button" class="btn btn-primary">Nuovo piatto</button>
                </a>
            </div>
        </div>
        @foreach ($foods as $food)
        <div class="row details mb-4 {{$food["visible"] ? '' : 'opacity_50'}}">
            <div class="col-2 text-center">
                {{-- test-image --}}
                <img class="food_photo" src="{{  asset('storage/' .  $food['image'])}}" alt="">
                {{-- /test-image --}}
            </div>
            <div class="col-2 text-center">
                <h4>Nome Piatto</h4>
                {{$food["name"]}}
            </div>
            <div class="col-3">
                <h4 class="text-center">Descrizione</h4>
                <p class="description">{{$food["description"]}}</p>
            </div>
            <div class="col-2 text-center">
                <h4>Allergeni</h4>
                {{$food["allergens"]}}
            </div>
            <div class="col-1 text-center">
                <h4>Peso</h4>
                {{$food["weight"]}}
            </div>
            <div class="col-1 text-center">
                <h4>Prezzo</h4>
                <div>{{$food["price"]}}€</div>
            </div>
            <div class="col-1 text-center">
                {{-- <a href="{{route('admin.foods.show', $food["id"])}}"><button class="btn btn-primary">Visualizza</button></a> --}}
                <a href="{{route('admin.foods.edit', $food["id"])}}">
                    <i class="fas fa-edit"></i>
                </a>
                <br>
                {{-- delete button modale --}}
                <form action="{{route('admin.foods.destroy', $food["id"])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-delete"  data-id="{{$food["id"]}}" data-toggle="modal" data-target="#deleteModal">
                        <i class="fas fa-trash-alt pointer"></i>
                    </button>
                </form>
            </div>
            
            
            
        </div>
        @endforeach
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
                <input type="hidden" id="delete-id" name="id">
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
</div>
@endsection