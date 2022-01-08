@extends('layouts.app')

    @section('content')

        <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 py-24 mx-auto">
                <div class="mb-12">
                    <h2 class="text-2xl font-medium text-gray-900 title-font">
                        {{ $anuncio->workspace }}
                    </h2>
                </div>
                <div class="-my-6">
                    <div class="flex flex-wrap md:flex-nowrap">
                        <div class="content w-full md:w-3/4 pr-4 leading-relaxed text-base">
                            {!! $anuncio->job_description !!}
                            <br>
                            {!! $anuncio->desired_skills !!}
                            <br><br>
                            @if($anuncio->type == 'T')
                                <p class="leading-relaxed text-gray-900"> Salário estimado: {!! $anuncio->salary !!}€ </p>

                            @elseif($anuncio->type == 'ER')
                                <p class="leading-relaxed text-gray-900"> Salário estimado: {!! $anuncio->salary !!}€</p>
                            @else
                                <p class="leading-relaxed text-gray-900"> Sem remuneração </p>
                            @endif
                        </div>
                        <div class="w-full md:w-1/4 pl-4">
                            <img src="{{asset('storage/images/'.$photo->path)}}" class="max-w-full mb-4">
                            <p class="leading-relaxed text-base">
                                <strong>Location: </strong>{{ $anuncio->city }}<br>
                                <strong>Company: </strong>{{ $user->name }}
                            </p>
                            <a href="{{ route('apply_anuncio') }}" class="block text-center my-4 tracking-wide bg-white text-indigo-500 text-sm font-medium title-font py-2 border border-indigo-500 hover:bg-indigo-500 hover:text-white uppercase">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endsection