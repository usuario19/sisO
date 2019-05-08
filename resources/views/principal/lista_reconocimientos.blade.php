@extends('plantillas.main')

@section('title')
SisO - Lista de gestiones
@endsection

@section('content')
<div class="container mx-auto padd_none">
  <div class="container-fluid" style="background: #FFC107">
    <div class="div-title-principal container text-center" style="height: 80px">
      <h5 class="lista text-dark">reconocimientos</h5>
    </div>
  </div>
</div>
<div class="container col-md-10 p-0">
    @foreach ($ganadores->groupBy('id_gestion') as $gestion)
    <div class="margin_top col-md-12 mx-auto padd_none">
      <h5 class="lista text-center" style="color:black">{{$gestion->first()->participacion->gestiones->nombre_gestion}}
      </h5>
    </div>
    <br>
    <div class="col-md-10 mx-auto p-0">
        <table class="table table-sm mi_tabla text-center table-bordered" >
            <thead>
                <tr>
              <th colspan="2">club</th>
              
                
                {{--  <th>disciplina</th>  --}}
                {{--  <th colspan="2">
                    Jugador
              </th>  --}}
                <th>reconocimiento</th>
              </tr>
            </thead>
            <tbody>
    @foreach ($gestion as $reco)
    
                <tr class="bg-dark text-white">
                    <th class="text-white">
                        <img class="mx-auto d-block" src="/storage/logos/{{$reco->club->logo}}" alt="" width="30"></th></th>
                    <th class="text-white">{{$reco->club->nombre_club}}</th>
                    {{--  <th class="text-white">{{$reco->participacion->disciplina->nombre_disciplina}}</th>  --}}
                    {{--  <th class="text-white">{{$reco->jugador->foto_jugador}}</th>
                    <th class="text-white">{{$reco->jugador->nombre_jugador." ".$reco->jugador->apellidos_jugador}}</th>  --}}
                    <th class="text-white">{{$reco->titulo}}</th>
            </tr>
    @endforeach
  </tbody>
</table>
</div>
  @endforeach

  @foreach ($ganadores2->groupBy('id_gestion') as $gestion)
    {{--  <div class="margin_top col-md-12 mx-auto padd_none">
      <h5 class="lista text-center" style="color:black">{{$gestion->first()->participacion->gestiones->nombre_gestion}}
      </h5>
    </div>  --}}
    <br>
    <div class="col-md-10 mx-auto p-0">
      <div class="table-responsive-xl">
          <table class="table table-sm mi_tabla text-center table-bordered" >
              <thead>
                  <tr>
                <th colspan="2">club</th>
                
                  
                  <th>disciplina</th>
                  <th colspan="2">
                      Jugador
                </th>
                  <th>reconocimiento</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($gestion as $reco)
      
                  <tr class="bg-dark text-white">
                      <th class="text-white">
                        
                          <img class=" mx-auto d-block" src="/storage/logos/{{$reco->club->logo}}" alt="" width="30"></th>
                      <th class="text-white">{{$reco->club->nombre_club}}</th>
                      <th class="text-white">{{$reco->participacion->disciplina->nombre_disc." ".$reco->participacion->disciplina->nombre_categoria($reco->participacion->disciplina->categoria)." ".$reco->participacion->disciplina->nombre_subcateg($reco->participacion->disciplina->sub_categoria)}}</th>
                      <th class="text-white">
                          <img class=" mx-auto d-block rounded-circle" src="/storage/logos/ {{$reco->jugador->foto_jugador}}" alt="" width="30"></th>
                        </th>
                      <th class="text-white">{{$reco->jugador->nombre_jugador." ".$reco->jugador->apellidos_jugador}}</th>
                      <th class="text-white">{{$reco->titulo}}</th>
              </tr>
      @endforeach
    </tbody>
  </table>
      </div>
        
</div>
  @endforeach
</div>

@endsection