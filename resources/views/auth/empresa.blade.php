@extends('layouts.app')

@section('content')
    <div class="bg-gradient-to-b from-gray-500 to-violet-50 px-20 py-10 flex justify-center items-center">
        @include('layouts.alert')
        <form method="POST" action="{{ route('register_empresa') }}" enctype="multipart/form-data" class="h-screen py-8">
            @csrf
            <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-md max-w-sm">
                <div class="space-y-4">
                    <h1 class="text-center text-2xl font-semibold text-gray-600">{{ __('Register Company') }}</h1>
                    <div>
                        @csrf
                        <div id="flexRadioDefault2">
                            <label for="nif" class="block mb-1 text-gray-600 font-semibold">{{ __('NIF') }}</label>
                            <input id="nif" type="text" class="form-control bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" name="nif" value="{{ old('nif') }}" required autocomplete="nif">

                            @error('nif')
                                <span class="text-red-600" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>  
                        <div class="py-6">  
                            <input type="file" name="image" placeholder="Choose image" id="image">
                                @error('image')
                                    <div class="text-red-600 mt-1 mb-1">{{ $message }}</div>
                                @enderror
                        </div> 
                        <button class="mt-2 w-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">{{ __('Register') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection