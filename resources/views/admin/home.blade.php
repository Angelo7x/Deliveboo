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
                <form action="{{route('admin.foods.destroy', $food["id"])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-delete">
                        Delete
                    </button>
                </form>
                <a href="{{route('admin.foods.edit', $food["id"])}}">
                    <button type="button" class="btn btn-warning">Modifica</button>
                </a>
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
@endsection
