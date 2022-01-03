@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Criar Anuncio') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('insert_anuncio') }}">
                        @csrf
                        <div class="row mb-3">
                            <select name="type">
                                <option value="E">Estágio</option>
                                <option value="ER">Estágio Remunerado</option>
                                <option value="T">Trabalho</option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="workspace" class="col-md-4 col-form-label text-md-right">{{ __('Workspace') }}</label>

                            <div class="col-md-6">
                                <input id="workspace" type="text" class="form-control @error('workspace') is-invalid @enderror" name="workspace" value="{{ old('workspace') }}" required autocomplete="workspace" autofocus>

                                @error('workspace')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="job_description" class="col-md-4 col-form-label text-md-right">{{ __('Job Description') }}</label>

                            <div class="col-md-6">
                                <input id="job_description" type="job_description" class="form-control @error('job_description') is-invalid @enderror" name="job_description" value="{{ old('job_description') }}" required autocomplete="job_description">

                                @error('job_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="desired_skills" class="col-md-4 col-form-label text-md-right">{{ __('Skills needed') }}</label>

                            <div class="col-md-6">
                                <input id="desired_skills" type="desired_skills" class="form-control @error('desired_skills') is-invalid @enderror" name="desired_skills" value="{{ old('desired_skills') }}" required autocomplete="skills">

                                @error('skills')
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
                            <label for="salary" class="col-md-4 col-form-label text-md-right">{{ __('Salary') }}</label>

                            <div class="col-md-6">
                                <input id="salary" type="salary" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" required autocomplete="salary">

                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br><br>

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
