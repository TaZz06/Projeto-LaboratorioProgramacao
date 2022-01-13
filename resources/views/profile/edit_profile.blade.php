@extends('layouts.app')

@section('content')
    <div class="bg-gray-100">
    <div class="container mx-auto my-5 p-5">
    <form method="POST" action="{{ route('edit_profile') }}" enctype="multipart/form-data" class="h-screen py-8">
        @method('PUT')
        @csrf
        <div class="md:flex no-wrap md:-mx-2 ">
            <div class="w-full md:w-3/12 md:mx-2">
                <div class="bg-white p-3 border-t-4 border-blue-600">
                <div class="image overflow-hidden">
                    @if(Auth::user()->type_user == 'E') 
                        <img src="{{asset('storage/images/'.$photo->path)}}" class="h-auto w-full mx-auto">
                    @endif
                    @if(Auth::user()->type_user == 'C') 
                        <img class="h-auto w-full mx-auto" src="storage/images/default_user.png" alt="">
                    @endif
                </div>
                <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{''}}</h1>
                <!--Colocar editar foto-->
                <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{''}}</h1>
                <ul
                    class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                    <li class="flex items-center py-3">
                        <span>Status</span>
                        <span class="ml-auto"><span
                            class="bg-gradient-to-tr from-blue-600 to-indigo-600 py-1 px-2 rounded text-white text-sm">Active</span></span>
                    </li>
                    <li class="flex items-center py-3">
                        <span>Member since</span>
                        <span class="ml-auto">{{$user->created_at->format('d-m-y')}}</span>
                    </li>
                </ul>
                </div>
                <div class="my-4"></div>
            </div>
            <div class="w-full md:w-9/12 mx-2 h-64">
                <div class="bg-white p-3 shadow-sm rounded-sm">
                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                    <span clas="text-green-500">
                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    <span class="tracking-wide">About</span>
                </div>
                <div class="text-gray-700">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                </span>
                                <span class="tracking-wide">Full Name</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
                            name="name" value="{{ ($user->name) }}" required autocomplete="name">
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                </span>
                                <span class="tracking-wide">Address</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
                            name="address" value="{{ ($user->address) }}" required autocomplete="address">
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                </span>
                                <span class="tracking-wide">Email</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
                            name="email" value="{{ ($user->email) }}" required autocomplete="email">
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                </span>
                                <span class="tracking-wide">Contact</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
                            name="contact" value="{{ ($user->contact) }}" required autocomplete="contact">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
                <div class="my-4"></div>
                @if(Auth::user()->type_user == 'C') 
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                </span>
                                <span class="tracking-wide">Experience</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                <input id="professional_experience" type="text" class="form-control @error('professional_experience') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
                            name="professional_experience" value="{{ ($candidato->professional_experience) }}" required autocomplete="professional_experience">
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path fill="#fff"
                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg>
                                </span>
                                <span class="tracking-wide">Profissional Area</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                <input id="profissional_area" type="text" class="form-control @error('profissional_area') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
                            name="profissional_area" value="{{ ($candidato->profissional_area) }}" required autocomplete="profissional_area">
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                </span>
                                <span class="tracking-wide">Educational</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                <input id="schooling" type="text" class="form-control @error('schooling') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
                            name="schooling" value="{{ ($candidato->schooling) }}" required autocomplete="schooling">
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                </span>
                                <span class="tracking-wide">Skills</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                <input id="skills" type="text" class="form-control @error('skills') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
                            name="skills" value="{{ ($candidato->skills) }}" required autocomplete="skills">
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                @endif
                @if(Auth::user()->type_user == 'E') 
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                </span>
                                <span class="tracking-wide">NIF</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                <input id="nif" type="text" class="form-control bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" name="nif" value="{{ ($empresa->nif) }}" required autocomplete="nif">
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                </span>
                                <span class="tracking-wide">Description</span>
                            </div>  
                            <ul class="list-inside space-y-2">
                                <li>
                                    <textarea 
                                    id="description" 
                                    type="text" 
                                    class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-indigo-50 px-4 py-2 outline-none rounded-md text-grey-darker border border-grey-lighter form-control @error('description') is-invalid @enderror" 
                                    name="description" 
                                    autocomplete="description">{{ $empresa->description }}</textarea>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                @endif
                <button class="mt-4 w-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">{{ __('Save') }}</button>
            </div>
        </div>
        </form>
    </div>
    </div>
@endsection