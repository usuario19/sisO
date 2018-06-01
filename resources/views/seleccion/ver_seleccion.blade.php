@extends('plantillas.main')

@section('title')
    SisO - Mi participacion
@endsection

@section('content')
	<div class="container col-md-12 table-responsive-xl">
    <p class="display-4" style="font-size: 30px; font-weight: bold;">Mi participacion </p>
  <br>
  <table class="table table-sm table-bordered">
    <thead>
        @foreach($jugador as $dato)
          <tr>
            <th>
              <div class="row">
                <div class="col-md-6" >
                  <p class="text-center display-4" style="font-size: 30px;"><img src="/storage/fotos/{{ $dato->jugador->foto_jugador }}" alt="" width="50px" height="50px">
                      {{ $dato->jugador->nombre_jugador." ".$dato->jugador->apellidos_jugador }}</p>
                </div>                    
                <div class="col-md-6" >
                  <p class="text-center display-4" style="font-size: 30px;"><img src="/storage/logos/{{ $dato->club->logo }}" alt="" width="50px" height="50px">
                      {{ $dato->club->nombre_club }}</p>
                    
                </div>
              </div>
            </th>
          </tr>
        @endforeach
    </thead>
  </table>
</div>

@foreach($selecciones as $seleccion)
<div class="container col-md-12 table-responsive-xl">
<table class="table table-sm table-bordered">
      <thead>
        <tr>
            <th colspan="10">
              <div class="row">
                <div class="col-md-6" >
                  <p class="text-center display-4" style="font-size: 30px;">{{ $seleccion->club_participacion->gestion->nombre_gestion }}</p>
                </div> 

                <div class="col-md-6" >
                  <p class="text-center display-4" style="font-size: 30px;"><img src="/storage/foto_disc/{{ $seleccion->club_participacion->disciplina->foto_disc }}" alt="" width="50px" height="50px">
                    @if($seleccion->club_participacion->disciplina->categoria == 1)
                      {{ $seleccion->club_participacion->disciplina->nombre_disc."(Mujeres)" }}</p>
                    @elseif($seleccion->club_participacion->disciplina->categoria == 2)
                      {{ $seleccion->club_participacion->disciplina->nombre_disc."(Varones)" }}</p>
                    @else
                      {{ $seleccion->club_participacion->disciplina->nombre_disc."(Mixto)" }}</p>
                    @endif
                </div>
              </div>
            </th>
        </tr>
        
      </thead>
      <tbody>
          
      </tbody>
    </table>
</div>

@endforeach
@endsection