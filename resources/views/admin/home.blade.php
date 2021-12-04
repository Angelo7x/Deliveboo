@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul>
                @foreach ($foods as $food)
                <li>{{$food["name"]}}</li>
                <form action="{{route('admin.foods.destroy', $food["id"])}}" method="POST" class="ml-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ml-1 btn-delete">
                        Delete
                    </button>
                </form>
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
