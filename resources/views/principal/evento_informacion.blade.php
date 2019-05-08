@extends('plantillas.main')

@section('title')
    SisO - Evento
@endsection

@section('content')

    {{--  <div class="container-fluid padd_none" >
        <div class="div-title-principal container text-center" style="background: #333333">
                <h1 class="lista" style="color:white">GALERIA</h1>
        </div>
    </div>  --}}
    <div class="container" style="background:#1A1A1A ">
            <div class="div-title-sub container text-left">
                <a class="" href="{{ route('principal.noticias') }}" style="text-decoration:none">
                    <h6 class="title-principal text-white" style="font-size:18px">GALERIA</h6></a>
            </div>
        </div>
        <div class="container" style="background: #333333">
            <div class="div-title-principal container text-center">
                    <h1 class="lista text-white">{{$datos->first()->gestion->nombre_gestion}}</h1>
            </div>
        </div>
        
    <div class="container py-3" style="margin-top: 20px; background: #333333">

            <div class="container col-md-12">
                <h4 class="lista_sub" style="color:white">{{ $datos->first()->titulo}}</h4>
            </div>
            <div class="col-md-12 mx-auto">
                <div class="form-row">
                    
                    @foreach($datos as $img)
                    {{--  {{dd($img)}}  --}}
                    @php
                        $date = new Date($img->fecha_publicacion);
                    @endphp
                    <div class="col-md-4 img_galeria cubo">
                        <div class="text-center img_galeria cubo" style="margin-top: 20px">
                                <span class="" style="color:white">{{$date->format('l, j F Y')}}</span><br>
                            <img class="mx-auto d-block cubo" src="/storage/fotos/{{ $img->foto}}" alt="" width="" height="200px">
                            <span class="" style="color:white">{{$img->comentario}}</span><br>
                        </div>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>

    
@endsection
  

