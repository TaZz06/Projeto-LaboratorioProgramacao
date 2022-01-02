@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Candidato') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register_candidato') }}">
                        @csrf
                        <div id="flexRadioDefault1">
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
                         
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="">
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
