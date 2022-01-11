@extends('layouts.app')

    @section('content')

        <section class="container px-5 py-12 mx-auto">
                <div class="bg-cover bg-center mb-12" style="background-image: url('./h1_hero.jpg')"></div>
                    <form class="flex w-full justify-center items-end" action="{{ route ('search')}}" method="get">
                        @csrf
                        <div class="relative mr-4 w-full lg:w-1/2 text-left">
                            <input type="text" name="pesquisa" value=" {{request()->get('pesquisa')}} " 
                            class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-indigo-200 focus:bg-transparent border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <button class="inline-flex text-white bg-gradient-to-tr from-blue-600 to-indigo-600 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Search</button>
                    </form>
                </div>
                
                <div class="mb-12">
                    <h2 class="text-2xl font-medium text-white title-font px-4">Opportunities: ( {{ $infos->count() }} )</h2>
                </div>

                <div class="-my-6 border-b border-gray-300 space-y-3">
                     @foreach($infos as $info)
                            <div class="py-6 px-4 flex flex-wrap md:flex-nowrap border-b border-gray-300 bg-white hover:bg-indigo-200 rounded-md">
                                <div class="md:w-16 md:mb-0 mb-6 mr-4 flex-shrink-0 flex flex-col  ">
                                    @if($info->logo_id)
                                        <img src="{{asset('storage/images/'.$info->path)}}" class="w-16 h-16 rounded-full object-cover">
                                    @endif
                                </div>
                                <div class="md:w-1/2 mr-8 flex flex-col items-start justify-center">
                                    <a href="{{ route('show_anuncio', $info->id) }}"> 
                                        <h2 class="text-xl font-bold text-gray-900 title-font mb-1">{{ $info->workspace }}</h2>
                                    </a>
                                    <p class="leading-relaxed text-gray-900">
                                        {{ $info->name }} &mdash; <span class="text-gray-600">{{ $info->city }}</span>
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
                                    <span>{{ \Carbon\Carbon::parse($info->created_at)->diffForHumans() }}</span>
                                </span>
                            </div>
                    @endforeach
                </div>	
        </section>
        
    @endsection