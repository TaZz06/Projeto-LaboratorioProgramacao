@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
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

                        <div class="row mb-3">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="contact" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact">

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
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

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class=" col-md-3 form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="radiochoice1" value="C">
                            <label class="form-check-label" for="flexRadioDefault1">Candidato</label>
                        </div>
                        <div class=" col-md-0 form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="radiochoice2" value="E">
                            <label class="form-check-label" for="flexRadioDefault2">Empresa</label>
                        </div>
                        <br><br>
                            
                      <!--  <div id="flexRadioDefault1" class="d-none">
                            <?php
                                $parameters = array('Profissional Area', 'Schooling', 'Professional Experience', 'Skills');
                                $names = array('ProfissionalArea', 'Schooling', 'ProfessionalExperience', 'Skills');
                            ?>

                            @foreach (array_combine($parameters, $names) as $parameter => $name)
                                <div class="row mb-3">
                                    <label for="{{$parameter}}" class="col-md-4 col-form-label text-md-right">{{$parameter}}</label>

                                    <div class="col-md-6">
                                        <input id="{{$parameter}}" type="text" class="form-control @error($parameter)
                                        is-invalid @enderror" name="{{$name}}" value="{{ old($parameter) }}" required autocomplete="{{$parameter}}" autofocus>

                                        @error('{{$parameter}}')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="flexRadioDefault2" class="d-none">
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
-->
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
