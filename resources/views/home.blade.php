@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 post-list">
            <?php 
                use App\Models\Anuncio;
                use App\Models\Empresa;
                use App\Models\Photo;

                $anuncios = Anuncio::all();
            ?>
            @foreach($anuncios as $anuncio)
                <div class="single-post d-flex flex-row">
                    <div class="thumb">
                        <?php $empresa = Empresa::getEmpresaById($anuncio->empresa_id); ?>
                        @if($empresa->logo_id)
                            <?php $logo = Photo::getPhotoById($empresa->logo_id); ?>
                            <img src="{{asset('storage/images/'.$logo->path)}}" alt="{{$logo->name}}" width="200" height="auto">
                        @endif
                    </div>
                    <div class="details">
                        <div class="title d-flex flex-row justify-content-between">
                            <div class="titles">
                                <a href="{{ route('show_anuncio', $anuncio->id) }}"><h4>{{ $anuncio->workspace }}</h4></a>
                                <h6>{{ $empresa->name }}</h6>					
                            </div>
                        </div>
                        <p>
                            {{ $anuncio->job_description }}
                        </p>
                        <h5>Skills needed: {{ $anuncio->desired_skills }}</h5>
                        @if($anuncio->type == 'T')
                            <p class="address"><span class="lnr lnr-map"></span> Trabalho</p>
                            <p class="address"><span class="lnr lnr-database"></span> {{ $anuncio->salary }}€</p>
                        @elseif($anuncio->type == 'ER')
                            <p class="address"><span class="lnr lnr-map"></span> Estágio Remunerado</p>
                            <p class="address"><span class="lnr lnr-database"></span> {{ $anuncio->salary }}€</p>
                        @else
                            <p class="address"><span class="lnr lnr-map"></span> Estágio</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>	
    </div>	
</div>	
@endsection
