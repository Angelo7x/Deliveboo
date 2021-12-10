@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="registerForm">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <small>Error message</small>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vat_numb" class="col-md-4 col-form-label text-md-right">{{ __('Partita Iva') }}</label>
                            
                            <div class="col-md-6">
                                <input id="vat_numb" type="text" class="form-control @error('vat_numb') is-invalid @enderror" name="vat_numb" value="{{ old('vat_numb') }}" required autocomplete="vat_numb">
                                
                                @error('vat_numb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="business_name" class="col-md-4 col-form-label text-md-right">{{ __('Nome attività') }}</label>

                            <div class="col-md-6">
                                <input id="business_name" type="text" class="form-control @error('business_name') is-invalid @enderror" name="business_name" value="{{ old('business_name') }}" required autocomplete="business_name">

                                @error('business_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="business_address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo attività') }}</label>

                            <div class="col-md-6">
                                <input id="business_address" type="text" class="form-control @error('business_address') is-invalid @enderror" name="business_address" value="{{ old('business_address') }}" required autocomplete="business_address">

                                @error('business_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="business_logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo attività') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="@error('business_logo') is-invalid @enderror" name="business_logo" value="{{ old('business_logo') }}" autocomplete="business_logo">
                                
                                @error('business_logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="mt-2">
                                    <img id="businessLogo" style="max-height: 50px;" class="mb-2"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="business_cover" class="col-md-4 col-form-label text-md-right">{{ __('Cover attività') }}</label>
                            <div class="col-md-6">
                                <input id="image1" type="file" class="@error('business_cover') is-invalid @enderror" name="business_cover" value="{{ old('business_cover') }}" autocomplete="business_cover">
                                
                                @error('business_cover')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="mt-2">
                                    <img id="businessCover" style="max-height: 50px;" class="mb-2"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <p class="col-md-4 text-md-right">
                                Cucine
                            </p>
                                <div class="col-md-6">
                                    @foreach ($cuisines as $cuisine)
                                    <div class="custom-control custom-checkbox">
                                        <input {{in_array($cuisine['id'], old('cuisines', [])) ? 'checked' : null}} type="checkbox" value="{{$cuisine["id"]}}" class="custom-control-input" name="cuisines[]" id="{{$cuisine["id"]}}">
                                        <label class="custom-control-label" for="{{$cuisine["id"]}}">{{$cuisine["name"]}}</label>
                                    </div>
                                    @endforeach
                                    @error('cuisines')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                        </div>
                            
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
