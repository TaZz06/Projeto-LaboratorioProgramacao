@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-5 bg-gradient-to-b from-gray-500 to-violet-50 h-screen">
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
                <div class="flex relative items-center space-x-2 font-semibold text-gray-900 leading-8">
                    <span clas="text-green-500">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    <span class="tracking-wide">About</span>
                    <a class="absolute h-6 w-6 right-0" href="{{ route('edit_profile_form') }}"><svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg></a>
                </div>
                <div class="text-gray-700">
                    <div class="grid md:grid-cols-2 text-sm">
                        <div class="grid grid-cols-1">
                            <div class="px-4 py-2 font-semibold">Full Name</div>
                            <div class="px-4 py-2">{{$user->name}}</div>
                        </div>
                        <div class="grid grid-cols-1">
                            <div class="px-4 py-2 font-semibold">Address</div>
                            <div class="px-4 py-2">{{$user->address}}</div>
                        </div>
                        <div class="grid grid-cols-1">
                            <div class="px-4 py-2 font-semibold">Email</div>
                            <div class="px-4 py-2">
                            <a class="text-blue-800" href="mailto:$user->email">{{$user->email}}</a>
                            </div>
                        </div>
                        <div class="grid grid-cols-1">
                            <div class="px-4 py-2 font-semibold">Contact No.</div>
                            <div class="px-4 py-2">{{$user->contact}}</div>
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
                                <div class="text-teal-600">{{$candidato->professional_experience}}</div>
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
                                <div class="text-teal-600">{{ $candidato->profissional_area }}</div>
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
                                <div class="text-teal-600">{{$candidato->schooling}}</div>
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
                                <div class="text-teal-600">{{$candidato->skills}}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    @foreach($infos as $info)
                        <div class="border-b border-gray-300 bg-white hover:bg-indigo-200 rounded-md mb-2">
                            <div class="relative">
                                <a class="absolute w-5 h-5 text-red-500 right-4 top-2" href="{{ route('remove_candidatura', $info->idAnuncio) }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                            </div>
                            
                            <div class='py-6 px-4 flex flex-wrap md:flex-nowrap'>
                                <div class="md:w-1/2 mr-8 flex flex-col items-start justify-center">
                                    <a href="{{ route('show_anuncio', $info->idAnuncio) }}"> 
                                        <h2 class="text-xl font-bold text-gray-900 title-font mb-1">{{ $info->workspace }}</h2>
                                    </a>
                                    <p class="leading-relaxed text-gray-900">
                                        <span class="text-gray-600">{{ $info->city }}</span>
                                    </p>
                                </div>
                                <div class="md:flex-grow mr-8 flex items-center justify-start">
                                    @if($info->type == 'J')
                                        <p class="leading-relaxed text-gray-900"> Job </p>

                                    @elseif($info->type == 'PI')
                                        <p class="leading-relaxed text-gray-900"> Paid Internship</p>
                                    @else
                                        <p class="leading-relaxed text-gray-900"> Internship </p>
                                    @endif
                                </div>
                                <span class="md:flex-grow flex items-center justify-end">
                                    <span>Applied: {{ \Carbon\Carbon::parse($info->applied_at)->diffForHumans() }}</span>
                                </span>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if(Auth::user()->type_user == 'E') 
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="grid grid-cols-2">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                </span>
                                <span class="tracking-wide">NIF</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                <div class="text-teal-600">{{$empresa->nif}}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>

                    <div class="mb-4 mt-4">
                        <h2 class="text-xl font-bold text-gray-900 title-font px-4">Advertisements Created: ( {{ $anuncios->count() }} )</h2>
                    </div>

                    @foreach($anuncios as $anuncio)
                        <div class="pb-4 border-b border-gray-300 bg-white hover:bg-indigo-200 rounded-md mb-2">
                            <div class="relative">
                                <form class="absolute w-5 h-5 text-red-500 right-4 top-2" action="{{ route('remove_anuncio', $anuncio->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            
                            <div class='py-6 px-4 flex flex-wrap md:flex-nowrap'>
                                <div class="md:w-1/2 mr-8 flex flex-col items-start justify-center">
                                    <a href="{{ route('show_anuncio', $anuncio->id) }}"> 
                                        <h2 class="text-xl font-bold text-gray-900 title-font mb-1">{{ $anuncio->workspace }}</h2>
                                    </a>
                                    <p class="leading-relaxed text-gray-900">
                                        <span class="text-gray-600">{{ $anuncio->city }}</span>
                                    </p>
                                </div>
                                <div class="md:flex-grow mr-8 flex items-center justify-start">
                                    @if($anuncio->type == 'J')
                                        <p class="leading-relaxed text-gray-900"> Job </p>

                                    @elseif($anuncio->type == 'PI')
                                        <p class="leading-relaxed text-gray-900"> Paid Internship</p>
                                    @else
                                        <p class="leading-relaxed text-gray-900"> Internship </p>
                                    @endif
                                </div>
                                <span class="md:flex-grow flex items-center justify-end">
                                    <span>Created: {{ \Carbon\Carbon::parse($anuncio->created_at)->diffForHumans() }}</span>
                                </span>
                            </div>
                            @foreach($infos as $info)
                                @if ($info->anuncio_id == $anuncio->id)
                                    <div class="py-3 px-20 flex flex-wrap md:flex-nowrap border-b border-gray-300 bg-gray-300 hover:bg-white rounded-md mb-2 ml-7 mr-7">
                                        <div class="md:w-1/2 mr-8 flex flex-col items-start justify-center">
                                            <p class="text-gray-700">{{ $info->user_name }}</p>
                                        </div>
                                        <div class="md:w-1/2 mr-8 flex flex-col items-start justify-center">
                                            <p class="text-gray-700">{{ $info->comment }}</p>
                                        </div>
                                        <div class="md:flex-grow mr-8 flex items-center justify-center">
                                            <a class="text-sm text-blue-500 hover:text-blue-800" href="{{ route('download_cv', $info->pdf_path) }}"> Curriculum Vitae </a>
                                        </div>
                                        <span class="md:flex-grow flex items-center justify-end">
                                            <span>Applied: {{ \Carbon\Carbon::parse($info->created_at)->diffForHumans() }}</span>
                                        </span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection