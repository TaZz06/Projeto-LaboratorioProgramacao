@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Criar Anuncio') }}</div>

                <div class="card-body">
                    <form id="payment_form" method="POST"  action="{{ route('insert_anuncio') }}">
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
                                <input id="job_description" type="job_description" class="form-control @error('job_description') is-invalid @enderror rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" name="job_description" value="{{ old('job_description') }}" required autocomplete="job_description">

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
                                <input id="desired_skills" type="desired_skills" class="form-control @error('desired_skills') is-invalid @enderror rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" name="desired_skills" value="{{ old('desired_skills') }}" required autocomplete="skills">

                                @error('skills')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city">

                                @error('city')
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
