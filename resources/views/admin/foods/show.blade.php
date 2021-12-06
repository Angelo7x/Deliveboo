@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
					<h1>{{$food["name"]}}</h1>
                    @if ($food["description"])
                        <p>{{$food["description"]}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection