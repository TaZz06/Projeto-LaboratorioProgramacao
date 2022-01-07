@extends('layouts.app')

    @section('content')

    <section class="container px-5 py-12 mx-auto">
            <div class="mb-12">
                <form class="flex w-full justify-center items-end" action="{{ route ('search')}}" method="get">
                    <div class="relative mr-4 w-full lg:w-1/2 text-left">
                        <input type="text" name="pesquisa" value=" {{request()->get('pesquisa')}} " class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-indigo-200 focus:bg-transparent border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Search</button>
                </form>
            </div>
            
            <?php 
                use App\Models\Anuncio;
                use App\Models\Empresa;
                use App\Models\Photo;
                use App\Models\User;

               $anuncios = Anuncio::all();
            ?>
             <div class="mb-12">
                <h2 class="text-2xl font-medium text-gray-900 title-font px-4">All jobs: ( {{ $anuncios->count() }} )</h2>
            </div>

            <div class="-my-6">

                @foreach($anuncios as $anuncio) 
                <div class="py-6 px-4 flex flex-wrap md:flex-nowrap border-b border-gray-100 bg-white hover:bg-gray-100">
                        <div class="md:w-16 md:mb-0 mb-6 mr-4 flex-shrink-0 flex flex-col  ">
                            <?php $empresa = Empresa::where('id', $anuncio->empresa_id)->first();?>
                            @if($empresa->logo_id)
                                <?php $logo = Photo::where('id', $empresa->logo_id)->first(); ?>
                                <img src="{{asset('storage/images/'.$logo->path)}}" class="w-16 h-16 rounded-full object-cover">
                            @endif
                        </div>
                        <div class="md:w-1/2 mr-8 flex flex-col items-start justify-center">
                            <a href="{{ route('show_anuncio', $anuncio) }}"> 
                                <h2 class="text-xl font-bold text-gray-900 title-font mb-1">{{ $anuncio->workspace }}</h2>
                            </a>
                            <p class="leading-relaxed text-gray-900">
                                <?php $user = User::where('id', $empresa->user_id)->first(); ?>
                                {{ $user->name }} &mdash; <span class="text-gray-600">{{ $anuncio->city }}</span>
                            </p>
                        </div>
                        <div class="md:flex-grow mr-8 flex items-center justify-start">
                            @if($anuncio->type == 'T')
                                <p class="leading-relaxed text-gray-900"> Trabalho </p>

                            @elseif($anuncio->type == 'ER')
                                <p class="leading-relaxed text-gray-900"> Estágio Remunerado</p>
                            @else
                                <p class="leading-relaxed text-gray-900"> Estágio </p>
                            @endif
                        </div>
                            <span class="md:flex-grow flex items-center justify-end">
                                <span>{{ $anuncio->created_at->diffForHumans() }}</span>
                            </span>
                    </div>
                @endforeach
            </div>	
    </section>
    @endsection
