@extends('layouts.app')

@section('content')
    <div class="h-screen bg-gradient-to-b from-gray-500 to-violet-50 px-20 py-10 flex justify-center items-center w-full">
        <form method="POST" action="{{ route('login') }}" class="h-screen py-52">
            @csrf
            <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-md max-w-sm">
                <div class="space-y-4">
                    <h1 class="text-center text-2xl font-semibold text-gray-600">{{ __('Login') }}</h1>
                    <div>
                        <label for="email" class="block mb-1 text-gray-600 font-semibold">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block mb-1 text-gray-600 font-semibold">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
                        name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <input class="form-check-input bg-indigo-50 px-2 py-2 outline-none rounded-md" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label text-gray-600 font-semibold" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <button class="mt-4 w-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">{{ __('Login') }}</button>
                @include('layouts.alert')
                @if (Route::has('password.request'))
                    <div class="justify-center">
                        <div class="space-y-2">
                            <a class="inline-block text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                        <div class="space-y-2">
                            <a class="inline-block text-sm text-blue-500 hover:text-blue-800 " href="{{ route('register') }}">
                            {{ __('Sign in') }}
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </form>
    </div>
@endsection

