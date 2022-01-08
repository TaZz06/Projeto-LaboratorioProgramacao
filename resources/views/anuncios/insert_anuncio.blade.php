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



<section class="text-gray-600 body-font overflow-hidden">
    <div class="w-full md:w-1/2 py-24 mx-auto">
        <div class="mb-4">
            <h2 class="text-2xl font-medium text-gray-900 title-font">
                Create a new listing ($99)
            </h2>
        </div>
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-200 text-red-800">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form
            action=""
            id="payment_form"
            method="post"
            enctype="multipart/form-data"
            class="bg-gray-100 p-4"
        >
            @guest
                <div class="flex mb-4">
                    <div class="flex-1 mx-2">
                        <label for="email" value="Email Address" />
                        <input
                            class="block mt-1 w-full"
                            id="email"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus />
                    </div>
                    <div class="flex-1 mx-2">
                        <label for="name" value="Full Name" />
                        <input
                            class="block mt-1 w-full"
                            id="name"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required />
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="flex-1 mx-2">
                        <label for="password" value="Password" />
                        <input
                            class="block mt-1 w-full"
                            id="password"
                            type="password"
                            name="password"
                            required />
                    </div>
                    <div class="flex-1 mx-2">
                        <label for="password_confirmation" value="Confirm Password" />
                        <input
                            class="block mt-1 w-full"
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required />
                    </div>
                </div>
            @endguest
            <div class="mb-4 mx-2">
                <label for="title" value="Job Title" />
                <input
                    id="title"
                    class="block mt-1 w-full"
                    type="text"
                    name="title"
                    required />
            </div>
            <div class="mb-4 mx-2">
                <label for="company" value="Company Name" />
                <input
                    id="company"
                    class="block mt-1 w-full"
                    type="text"
                    name="company"
                    required />
            </div>
            <div class="mb-4 mx-2">
                <label for="logo" value="Company Logo" />
                <input
                    id="logo"
                    class="block mt-1 w-full"
                    type="file"
                    name="logo" />
            </div>
            <div class="mb-4 mx-2">
                <label for="location" value="Location (e.g. Remote, United States)" />
                <input
                    id="location"
                    class="block mt-1 w-full"
                    type="text"
                    name="location"
                    required />
            </div>
            <div class="mb-4 mx-2">
                <label for="apply_link" value="Link To Apply" />
                <input
                    id="apply_link"
                    class="block mt-1 w-full"
                    type="text"
                    name="apply_link"
                    required />
            </div>
            <div class="mb-4 mx-2">
                <label for="tags" value="Tags (separate by comma)" />
                <input
                    id="tags"
                    class="block mt-1 w-full"
                    type="text"
                    name="tags" />
            </div>
            <div class="mb-4 mx-2">
                <label for="content" value="Listing Content (Markdown is okay)" />
                <textarea
                    id="content"
                    rows="8"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                    name="content"
                ></textarea>
            </div>
            <div class="mb-4 mx-2">
                <label for="is_highlighted" class="inline-flex items-center font-medium text-sm text-gray-700">
                    <input
                        type="checkbox"
                        id="is_highlighted"
                        name="is_highlighted"
                        value="Yes"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">
                    <span class="ml-2">Highlight this post (extra $19)</span>
                </label>
            </div>
            <div class="mb-6 mx-2">
                <div id="card-element"></div>
            </div>
            <div class="mb-2 mx-2">
                @csrf
                <input
                    type="hidden"
                    id="payment_method_id"
                    name="payment_method_id"
                    value="">
                <button type="submit" id="form_submit" class="block w-full items-center bg-indigo-500 text-white border-0 py-2 focus:outline-none hover:bg-indigo-600 rounded text-base mt-4 md:mt-0">Pay + Continue</button>
            </div>
        </form>
    </div>
</section>
@endsection




