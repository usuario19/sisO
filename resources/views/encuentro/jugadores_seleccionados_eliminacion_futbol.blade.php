@extends('plantillas.main')

@section('title')
    SisO - Lista de clubs
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
@include('encuentro.modal_agregar_jugador')
@include('encuentro.modal_agregar_jugador2')
@include('encuentro.modal_reg_gol_jugador')
@include('encuentro.modal_agregar_resultado_futbol')
@include('encuentro.modal_ver_res_futbol')

  <div class="container">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
         <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
         <li class="breadcrumb-item active" aria-current="page">{{ $fase->nombre_fase }}</li>
         <li class="breadcrumb-item"><a href="{{ route('fase.encuentros_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Encuentros</a></li>         
         <li class="breadcrumb-item active" value="{{ $encuentro->id_encuentro }}"  aria-current="page">{{ $encuentro->id_encuentro }}</li>
  </ol>
 </nav>
</div>
<div class="container">
  <div class="card">     
    <div class="row col-md-12">
      <div class="form-group col-md-10" style="text-align: center"><h4>Conformacion de equipos</h4></div>
      <div class="form-group col-md-2" >
        @if ($encuentro->tiene_resultado($encuentro->id_encuentro)==1)
        <button type="button" onclick="VerResultadoFutbol({{ $encuentro->id_encuentro }});" class="btn btn-warning" data-toggle="modal" data-target="#modalVerResultadoFutbol">
            <span>Resultado</span>
         </button>
        @else
        <button type="button" class="btn btn-warning btn_agregar" onclick="RegistrarResultadoFutbol({{ $encuentro->id_encuentro }});" data-toggle="modal" data-target="#modalResultadoFutbol">
            <span>Resultado</span>
         </button>
        @endif  
    </div>
  <div class="row container col-md-12">
    
     <div class="form-group col-md-6">
        <div class="card"> 
      <div class="row col-md-12">
        <div class="form-group col-md-10">
            <div class="form-group col-md-10"><h4>{{ $club1->nombre_club }}</h4></div>
           
          </div>
        <div class="form-group col-md-2">
            <a href=""  data-toggle="modal" data-target="#modalAgregarJugador1">
                <i title="Agregar" class="material-icons delete_button">
              add</i></a>
            </button>
        </div>
    </div>
      
      <table class="table table-responsive">
          <thead>
            <th width="50px">ID</th>
          <th>Jugador</th>
          <th>Goles</th>
          <th>Acciones</th>

          </thead>
          <tbody>
            @foreach($jug_hab1 as $jugadores)
              <tr>
                <td>{{ $jugadores->id_jugador }}</td> 
                <td>
                  <img class="img-thumbnail" src="/storage/fotos/{{ $jugadores->foto_jugador}}" alt="" height=" 50px" width="50px">
                  {{ $jugadores->nombre_jugador.' '.$jugadores->apellidos_jugador }}
                </td>
                <td style="text-align:center;">{{ $jugadores->posicion }}</td>
                <td><a href=" " onclick="reg_gol_jugador({{ $jugadores->id_jugador }});"  class="button_delete" data-toggle="modal" data-target="#modalRegGol">
                    <i title="Registrar resultados" class="material-icons delete_button button_redirect">
                        control_point
                    </i>
            </a>
                  <a href="{{ route('encuentro.eliminar_jugador_encuentro',[$encuentro->id_encuentro,$jugadores->id_jugador]) }}">
                    <i title="Eliminar" class="material-icons delete_button">
                  delete</i></a>
                  
                </td>
              </tr>
            @endforeach            
          </tbody>
      </table>
  </div>
</div>
    <div class="form-group col-md-6">
      <div class="card"> 
          <div class="row col-md-12">
          <div class="form-group col-md-10">
              <div class="form-group col-md-10"><h4>{{ $club2->nombre_club }}</h4></div>
            </div>
          <div class="form-group col-md-2">
              <a href=""  data-toggle="modal" data-target="#modalAgregarJugador2">
                  <i title="Agregar" class="material-icons delete_button">
                add</i></a>
      </div>
    </div>
    <table class="table table-responsive">
        <thead>
          <th width="50px">ID</th>
          <th>Jugador</th>
          <th>Goles</th>
          <th>Acciones</th>
        </thead>
        <tbody>
          @foreach($jug_hab2 as $jugadores)
            <tr>
                <td>{{ $jugadores->id_jugador }}</td> 
                <td>
                  <img class="img-thumbnail" src="/storage/fotos/{{ $jugadores->foto_jugador}}" alt="" height=" 50px" width="50px">
                  {{ $jugadores->nombre_jugador.' '.$jugadores->apellidos_jugador }}
                </td>
                <td style="text-align:center;">{{ $jugadores->posicion }}</td>
                <td>
                    <a href=" " onclick="reg_gol_jugador({{ $jugadores->id_jugador }});"  class="button_delete" data-toggle="modal" data-target="#modalRegGol">
                            <i title="Registrar resultados" class="material-icons delete_button button_redirect">
                                control_point
                            </i>
                    </a>
                    <a href="{{ route('encuentro.eliminar_jugador_encuentro',[$encuentro->id_encuentro,$jugadores->id_jugador]) }}"><i title="Eliminar" class="material-icons delete_button">
                        delete</i></a>
                </td>
            </tr>
          @endforeach            
        </tbody>
    </table>
  </div>
</div>     
</div>     
</div>     
</div>     
@endsection
@section('scripts')
{{--  {!! Html::script('/js/filtrar_por_nombre.js') !!}  --}}
{!! Html::script('/js/checkbox.js') !!}
@endsection