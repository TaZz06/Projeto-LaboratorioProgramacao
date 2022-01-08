@extends('layouts.app')

@section('content')
  <div class="bg-gradient-to-b from-gray-500 to-violet-50 px-20 py-10 flex justify-center items-center">
    <form method="POST" action="{{ route('register') }}" class="h-screen py-8">
      <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-md max-w-sm">
        <div class="space-y-4">
          <h1 class="text-center text-2xl font-semibold text-gray-600">{{ __('Register') }}</h1>
          <div>
            <label for="name" class="block mb-1 text-gray-600 font-semibold">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div>
            <label for="email" class="block mb-1 text-gray-600 font-semibold">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
            name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div>
            <label for="address" class="block mb-1 text-gray-600 font-semibold">{{ __('Address') }}</label>
            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
            name="address" value="{{ old('address') }}" required autocomplete="address">

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div>
            <label for="contact" class="block mb-1 text-gray-600 font-semibold">{{ __('Contact') }}</label>
            <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
            name="contact" value="{{ old('contact') }}" required autocomplete="contact">

            @error('contact')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div>
            <label for="password" class="block mb-1 text-gray-600 font-semibold">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
            name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div>
            <label for="password-confirm" class="block mb-1 text-gray-600 font-semibold">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" name="password_confirmation" required autocomplete="new-password">
          </div>

          <div>
            <input class="form-check-input bg-indigo-50 px-2 py-2 outline-none rounded-md" type="radio" name="flexRadioDefault" id="radiochoice1" value="C">
            <label class="form-check-label text-gray-600 font-semibold" for="flexRadioDefault1">Candidato</label>
          </div>
          <div>
            <input class="form-check-input bg-indigo-50 px-2 py-2 outline-none rounded-md" type="radio" name="flexRadioDefault" id="radiochoice2" value="E">
            <label class="form-check-label text-gray-600 font-semibold" for="flexRadioDefault2">Empresa</label>
          </div>
        </div>
        <button class="mt-4 w-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">{{ __('Register') }}</button>
        <div class="text-center">
          <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="{{ route('login') }}">
            Already have an account? Login!
          </a>
        </div>
      </div>
    </form>
  </div>
@endsection
