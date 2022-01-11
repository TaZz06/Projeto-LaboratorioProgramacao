@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-gray-500 to-violet-50 px-20 py-10 flex justify-center items-center">
    <form method="POST" action="{{ route('register_candidato') }}" class="h-screen py-8">
        @csrf
        <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-md max-w-sm">
            <div class="space-y-4">
                <h1 class="text-center text-2xl font-semibold text-gray-600">{{ __('Register Candidate') }}</h1>
                    <div>
                        @csrf
                        <div id="flexRadioDefault1">
                            <?php
                                $parameters = array('Profissional Area', 'Schooling', 'Professional Experience', 'Skills');
                                $names = array('profissional_area', 'schooling', 'professional_experience', 'skills');
                            ?>
                            @foreach (array_combine($parameters, $names) as $parameter => $name)
                            <div class="py-2">
                                <label for="{{$parameter}}" class="block mb-1 text-gray-600 font-semibold">{{$parameter}}</label>
                                <input id="{{$parameter}}" type="text" class="form-control @error($parameter)
                                    is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" name="{{$name}}" value="{{ old($parameter) }}" required autocomplete="{{$parameter}}" autofocus>
                                    
                                    @error('{{$parameter}}')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            @endforeach
                        </div>
                        <button class="mt-4 w-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">{{ __('Register') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
