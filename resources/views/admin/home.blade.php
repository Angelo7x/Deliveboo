@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container">
        <h2 class="my-5">Ciao <span class="name-risto">{{$user["name"]}}</span>,
             benvenuto nella dashboard
             <br> 
             del tuo ristorante <span class="name-risto">{{$user["business_name"]}}</span>!
        </h2>
    
        <div class="foods_dashboard p-5">
            <div class=" d-flex flex-wrap mb-5 justify-content-between align-items-center">
                <div>
                    <h1>I tuoi piatti</h1>
                    <p class="dashbord-p mb-3">Aggiungi e modifica i piatti o visualizza la pagina del tuo ristorante come visitatore</p>
                </div>
                <div class="col d-flex flex-wrap justify-content-end">
                    <a href="{{route('admin.foods.create')}}" class="mt-10 btn-link">
                        <button type="button" class="btn btn-yellow"><span>Nuovo piatto</span>
                           <i class="fas fa-pizza-slice"></i></button>
                    </a>
    
                    <a target="_blank" href="restaurants/{{$user["slug"]}}" class="mt-10 btn-link">
                        <button type="button" class="btn btn-trasparent "><span>Visualizza come visitatore</span>
                            <i class="far fa-eye"></i></button>
                    </a>
                </div>
                
            </div>
            <div class="flex-nowrap row column-title px-4 ">
               
                <div class="col-img display_mobile_mv_473">
                    {{-- test-image --}}
                    <h6>Immagine</h6>
                    {{-- /test-image --}}
                </div>
                <div class="col-md-2 col-sm-4 col-5">
                    <h6>Nome</h6>
                </div>
                <div class="col-3 display_mobile">
                    <h6 class="">Descrizione</h6>
           
                </div>
                <div class="col-sm-2 col-2 display_mobile">
                    <h6>Allergeni</h6>
               
                </div>
                <div class="col-1 display_mobile">
                    <h6>Peso</h6>
                  
                </div>
                <div class="col-md-1 col-sm-2 col-2 display_mobile_mv_580">
                    <h6 >Prezzo</h6>
                </div>
                <div class="col col-sm-2 col-2 col-xs-6">
                    <h6>Gestione</h6>
                </div>
                 
            </div>
            @foreach ($foods as $food)
    
            <div class="flex-nowrap dashbord-food-card row details align-items-start p-4 mb-4 {{$food["visible"] ? '' : 'opacity_50'}}">
               
                <div class="box-img display_mobile_mv_473">
                    {{-- test-image --}}
                    <img class="food_photo" src="{{  asset('storage/' .  $food['image'])}}" alt="">
                    {{-- /test-image --}}
                </div>
                <div class="col-md-2 col-sm-4 col-5">
                    <p class="font-weight-bold"> {{$food["name"]}}</p>
                </div>
                <div class="col-3 display_mobile">
                    <p class="description ">{{$food["description"]}}</p>
                </div>
                <div class="col-sm-2 col-2 display_mobile">
                   <i>
                    {{$food["allergens"]}}
                   </i>
                 
                </div>
                <div class="col-1 display_mobile">
                    <p>
                        {{$food["weight"]}}g
                    </p>
    
                </div>
                <div class="col-md-1 col-sm-2 col-2 display_mobile_mv_580">
               <p>
                {{$food["price"]}}€
               </p>
                   
                </div>
                <div class="col col-sm-2 col-2">
                    {{-- <a href="{{route('admin.foods.show', $food["id"])}}"><button class="btn btn-primary">Visualizza</button></a> --}}
                   <div class="buttons_mobile">
                    <button class="btn-edit" data-toggle="tooltip" data-html="true" title="Modifica il piatto">
                        <a href="{{route('admin.foods.edit', $food["id"])}}">
                            <svg   version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 700 700" style="enable-background:new 0 0 700 700;" xml:space="preserve" > 
                       <path d="M473.9,538.5H150.8c-5.9,0-10.8-4.8-10.8-10.8l0-495.4c0-5.9,4.8-10.8,10.8-10.8h231.3c3.1,0,6,1.3,8.1,3.7l91.8,104.4
                           c1.7,2,2.7,4.5,2.7,7.1v113c0,2.9-1.1,5.6-3.2,7.6L351.5,387.2l-15.1,30.3l30.3-15.1l99.6-99.6c3.1-3.1,7.7-4,11.7-2.3
                           c4,1.7,6.6,5.6,6.6,9.9v217.3C484.6,533.6,479.8,538.5,473.9,538.5L473.9,538.5z M161.6,516.9h301.5l0-180.6l-82.4,82.4
                           c-0.8,0.8-1.8,1.5-2.8,2l-60.7,30.4c-4.2,2.1-9.2,1.2-12.4-2c-3.3-3.3-4.1-8.3-2-12.4l30.4-60.7c0.5-1,1.2-2,2-2.8l128-128V140.7
                           l-85.9-97.6H161.6L161.6,516.9z"/>
                       <path d="M473.9,147.4h-91.7c-5.9,0-10.8-4.8-10.8-10.8V32.3c0-5.9,4.8-10.8,10.8-10.8c5.9,0,10.8,4.8,10.8,10.8v93.5h81
                           c5.9,0,10.8,4.8,10.8,10.8C484.6,142.6,479.8,147.4,473.9,147.4L473.9,147.4z"/>
                       <path d="M312.3,452.3c-2.8,0-5.6-1.1-7.6-3.2c-3.3-3.3-4.1-8.3-2-12.4L333,376c0.5-1,1.2-2,2-2.8l147.9-147.9c4-4,11.2-4,15.2,0
                           l30.4,30.4c2,2,3.2,4.8,3.2,7.6s-1.1,5.6-3.2,7.6L380.7,418.8c-0.8,0.8-1.8,1.5-2.8,2l-60.7,30.4
                           C315.6,451.9,313.9,452.3,312.3,452.3L312.3,452.3z M351.5,387.2l-15.1,30.3l30.3-15.1l139-139l-15.1-15.1L351.5,387.2z"/>
                       <path d="M520.9,274.1c-2.9,0-5.6-1.1-7.6-3.2l-30.4-30.4c-2-2-3.2-4.8-3.2-7.6s1.1-5.6,3.2-7.6l24.1-24.1c9.8-9.8,25.7-9.8,35.5,0
                           l10.1,10.1c9.8,9.8,9.8,25.7,0,35.5l-24.1,24.1C526.5,272.9,523.8,274.1,520.9,274.1L520.9,274.1z M505.8,232.9l15.1,15.1l16.5-16.5
                           c0.9-0.9,1-1.8,1-2.5s-0.2-1.6-1-2.5l-10.1-10.1c-1.7-1.7-3.3-1.7-5,0L505.8,232.9z"/>
                       <path d="M420,204.6H193.9c-5.9,0-10.8-4.8-10.8-10.8c0-5.9,4.8-10.8,10.8-10.8H420c5.9,0,10.8,4.8,10.8,10.8
                           C430.8,199.8,426,204.6,420,204.6z"/>
                       <path d="M398.5,333.9H193.9c-5.9,0-10.8-4.8-10.8-10.8s4.8-10.8,10.8-10.8h204.6c5.9,0,10.8,4.8,10.8,10.8
                           C409.2,329.1,404.4,333.9,398.5,333.9z"/>
                       <path d="M312.3,452.3H193.9c-5.9,0-10.8-4.8-10.8-10.8c0-5.9,4.8-10.8,10.8-10.8h118.5c5.9,0,10.8,4.8,10.8,10.8
                           C323.1,447.5,318.3,452.3,312.3,452.3z"/>
                           
                       </svg>
                        </a>
                    </button>
                    <button type="button" class="btn-delete"  data-id="{{$food["id"]}}" data-toggle="modal" data-target="#deleteModal">
                        <svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 700 700" style="enable-background:new 0 0 700 700;" xml:space="preserve">
                            <path d="M471,527.3H291.6c-30.1,0-54.6-24.5-54.6-54.6V185.6c0-4.8,3.4-9.1,8.1-10.1l87.7-18.9c0.8-0.1,1.4-0.2,2.2-0.2h180.1
                                c5.7,0,10.3,4.6,10.3,10.3v306.1C525.5,502.8,501,527.3,471,527.3L471,527.3z M257.6,193.9v278.9c0,18.7,15.2,34,34,34H471
                                c18.7,0,34-15.2,34-34V177H336L257.6,193.9z"/>
                            <path d="M182.3,199.6l-6.7-30.8c-5.9-27.5,11.5-54.6,39-60.5l222.8-48.1c27.5-5.9,54.6,11.5,60.5,39l6.7,30.8
                                c1.2,5.6-2.3,11-7.9,12.2l-302.2,65.2C189,208.7,183.5,205.2,182.3,199.6L182.3,199.6z M441.9,80.3l-222.8,48.1
                                c-16.4,3.5-26.8,19.6-23.2,36l4.5,20.8l282-60.9l-4.5-20.8C474.4,87.2,458.3,76.8,441.9,80.3L441.9,80.3z"/>
                            <path d="M288,113.3c-4.8,0-9.1-3.4-10.1-8.1l-2.2-10.1c-6-27.8,11.7-55.2,39.5-61.2s55.2,11.7,61.2,39.5l2.2,10.1
                                c1.2,5.6-2.3,11-7.9,12.2l-80.6,17.4C289.4,113.2,288.7,113.3,288,113.3L288,113.3z M319.6,54c-16.6,3.6-27.3,20.1-23.7,36.8
                                l60.5-13.1C352.7,61,336.2,50.4,319.6,54z"/>
                            <path d="M515.2,249.1h-268c-5.7,0-10.3-4.6-10.3-10.3s4.6-10.3,10.3-10.3h268c5.7,0,10.3,4.6,10.3,10.3S520.8,249.1,515.2,249.1z"/>
                            <path d="M443.1,465.5c-5.7,0-10.3-4.6-10.3-10.3V238.8c0-5.7,4.6-10.3,10.3-10.3s10.3,4.6,10.3,10.3v216.4
                                C453.4,460.9,448.8,465.5,443.1,465.5z"/>
                            <path d="M381.3,465.5c-5.7,0-10.3-4.6-10.3-10.3V238.8c0-5.7,4.6-10.3,10.3-10.3s10.3,4.6,10.3,10.3v216.4
                                C391.6,460.9,387,465.5,381.3,465.5z"/>
                            <path d="M319.4,465.5c-5.7,0-10.3-4.6-10.3-10.3V238.8c0-5.7,4.6-10.3,10.3-10.3s10.3,4.6,10.3,10.3v216.4
                                C329.7,460.9,325.1,465.5,319.4,465.5z"/>
                            <path d="M515.2,465.5h-268c-5.7,0-10.3-4.6-10.3-10.3s4.6-10.3,10.3-10.3h268c5.7,0,10.3,4.6,10.3,10.3S520.8,465.5,515.2,465.5z"/>
                        </svg>
                    </button>
                    <button  class = "show_food" data-toggle="tooltip" data-html="true" title="Visualizza il piatto">
                        <a href="{{route("admin.foods.show", $food["id"])}}">
                            <svg id="Livello_1" data-name="Livello 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 543.09 340.59">
                                <path d="M605.48,240.38C558.56,191.59,462.85,109.72,350,109.72S141.53,191.6,94.52,240.39a57,57,0,0,0,0,79.25c47,48.79,142.71,130.67,255.48,130.67h.25c112.76-.17,208.3-81.88,255.22-130.67a56.82,56.82,0,0,0,0-79.25Zm-255,175.89H350c-75.09,0-136.18-61.09-136.18-136.27s61.09-136.18,136.27-136.18S486.36,204.91,486.36,280s-61,136.1-135.92,136.27ZM119,296a23.15,23.15,0,0,1,0-32.16c20-20.78,49.55-48,85.36-71.27a168.68,168.68,0,0,0-.17,174.62C168.43,344,138.9,316.83,119,296Zm462.09,0c-19.94,20.7-49.47,47.86-85.19,71.19a168.68,168.68,0,0,0-.17-174.62c35.8,23.33,65.33,50.57,85.36,71.27a23,23,0,0,1,0,32.16Z" transform="translate(-78.48 -109.72)"/>
                                <path d="M350,167.66A112.43,112.43,0,1,0,462.43,280.08,112.52,112.52,0,0,0,350,167.66Zm0,190.91a78.49,78.49,0,1,1,78.48-78.48A78.57,78.57,0,0,1,350,358.57Z" transform="translate(-78.48 -109.72)"/>
                                <path d="M350,217.72a62.5,62.5,0,0,0-62.45,62.45,17,17,0,0,0,33.94,0A28.52,28.52,0,0,1,350,251.66a17,17,0,1,0,0-33.94Z" transform="translate(-78.48 -109.72)"/>
                              </svg>
                        </a>
                    </button>
                  
                   </div>
                   
                    
                    {{-- delete button modale --}}
                    {{-- <button type="button" class="btn btn-delete"  data-id="{{$food["id"]}}" data-toggle="modal" data-target="#deleteModal">
                        <i class="fas fa-trash-alt pointer"></i>
                    </button> --}}
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
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLabel">Conferma cancellazione Piatto</h5> --}}
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <form action="{{route("admin.foods.destroy", 'id')}}" method="POST">
                @csrf
                @method("DELETE")
                <input type="hidden" id="delete-id" name="id">
                <div class="modal-body">
                    <h5>Sei sicuro di voler cancellare il piatto?</h5>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-yellow p-1 btn_modal">Cancella</button>
                    <button type="button" class="btn btn-trasparent p-1 btn_modal" data-dismiss="modal">Annulla</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection