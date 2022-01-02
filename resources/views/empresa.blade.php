@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Empresa') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register_empresa') }}">
                        @csrf

                        <div id="flexRadioDefault2">
                            <div class="row mb-3">
                                <label for="nif" class="col-md-4 col-form-label text-md-right">{{ __('NIF') }}</label>
                            
                                <div class="col-md-6">
                                    <input id="nif" type="text" class="form-control @error('nif') is-invalid @enderror" name="nif" value="{{ old('nif') }}" required autocomplete="nif">
                            
                                    @error('nif')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @include('partials.upload')
                        </div>
                         
                        <div class="row mb-0">
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



