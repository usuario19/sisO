@extends('plantillas.main')

@section('title')
    SisO - Evento
@endsection

@section('content')

    <div class="container-fluid padd_none" >
        <div class="div-title-principal container text-center" style="background: #333333">
                <h1 class="lista" style="color:white">GALERIA</h1>
        </div>
    </div>
    <div class="container" style="margin-top: 10px ; padding-bottom:20px; background: #333333">
        
            <div class="reporte_img container col-md-12" style="color:white">
                <h4 class="lista" style="color:white">{{$datos->first()->gestion->nombre_gestion}}</h4>
            </div>
            <div class="container col-md-12">
                <h4 class="lista_sub" style="color:white">{{ $datos->first()->disciplina->nombre_disc." ".$datos->first()->disciplina->nombre_categoria($datos->first()->disciplina->categoria)." ".$datos->first()->disciplina->nombre_subcateg($datos->first()->disciplina->sub_categoria)}}</h4>
            </div>
            <div class="col-md-12 mx-auto">
                <div class="form-row">
                    
                    @foreach($datos as $img)
                    {{--  {{dd($img)}}  --}}
                    <div class="col-md-4 img_galeria cubo">
                        <div class="text-center img_galeria cubo" style="margin-top: 20px">
                            <img class="mx-auto d-block cubo" src="/storage/fotos/{{ $img->foto}}" alt="" width="" height="200px">
                            <span class="lista_sub_disc" style="color:white">{{$img->titulo}}</span><br>
                            <span class="" style="color:white">{{$img->comentario}}</span><br>
                        </div>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>

    
@endsection
  

