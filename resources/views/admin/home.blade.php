@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container">
        <h2 class="my-5">Ciao, <span>Nome utente</span>, benvenuto nella dashboard del ristorante 
            <span>Nome Ristorante</span>!
        </h2>
    
        <div class="foods_dashboard p-5">
            <div class=" d-flex flex-wrap mb-5 justify-content-between align-items-center">
                <div>
                    <h1>I tuoi piatti</h1>
                    <p class="dashbord-p mb-3">Aggiungi e modifica i piatti o visualizza la pagina del tuo ristorante com visitatore</p>
                </div>
                <div class="col d-flex flex-wrap justify-content-end">
                    <a href="{{route('admin.foods.create')}}" class="mt-10 btn-link">
                        <button type="button" class="btn btn-yellow"><span>Nuovo piatto</span>
                           <i class="fas fa-pizza-slice"></i></button>
                    </a>
    
                    <a href="{{route('admin.foods.create')}}" class="mt-10 btn-link">
                        <button type="button" class="btn btn-trasparent "><span>Visualizza come visitatore</span>
                            <i class="far fa-eye"></i></button>
                    </a>
                </div>
                
            </div>
            <div class="row column-title px-4 ">
               
                <div class="col-img">
                    {{-- test-image --}}
                    <h6>Immagine</h6>
                    {{-- /test-image --}}
                </div>
                <div class="col-2 ">
                    <h6>Nome</h6>
                
                </div>
                <div class="col-3">
                    <h6 class="">Descrizione</h6>
           
                </div>
                <div class="col-2 ">
                    <h6>Allergeni</h6>
               
                </div>
                <div class="col-1 ">
                    <h6>Peso</h6>
                  
                </div>
                <div class="col-1 ">
                    <h6>Prezzo</h6>
                    
                </div>
                <div class="col-1 ">
                </div>
                 
            </div>
            @foreach ($foods as $food)
    
            <div class="dashbord-food-card row details align-items-start p-4 mb-4 {{$food["visible"] ? '' : 'opacity_50'}}">
               
                <div class="box-img">
                    {{-- test-image --}}
                    <img class="food_photo" src="{{  asset('storage/' .  $food['image'])}}" alt="">
                    {{-- /test-image --}}
                </div>
                <div class="col-2 ">
                    <p class="font-weight-bold"> {{$food["name"]}}</p>
                </div>
                <div class="col-3">
                    <p class="description ">{{$food["description"]}}</p>
                </div>
                <div class="col-2 ">
                   <i>
                    {{$food["allergens"]}}
                   </i>
                 
                </div>
                <div class="col-1 ">
                    <p>
                        {{$food["weight"]}}g
                    </p>
    
                </div>
                <div class="col-1 ">
               <p>
                {{$food["price"]}}€
               </p>
                   
                </div>
                <div class="col-1 ">
                    {{-- <a href="{{route('admin.foods.show', $food["id"])}}"><button class="btn btn-primary">Visualizza</button></a> --}}
                   
                    <button class="btn btn-edit">
                        <a href="{{route('admin.foods.edit', $food["id"])}}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </button>
                  
                    
                    {{-- delete button modale --}}
                    <button type="button" class="btn btn-delete"  data-id="{{$food["id"]}}" data-toggle="modal" data-target="#deleteModal">
                        <i class="fas fa-trash-alt pointer"></i>
                    </button>
                    {{-- <form action="{{route('admin.foods.destroy', $food["id"])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete"  data-id="{{$food["id"]}}" data-toggle="modal" data-target="#deleteModal">
                            <i class="fas fa-trash-alt pointer"></i>
                        </button>
                    </form> --}}
                </div>
                 
            </div>
            @endforeach
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