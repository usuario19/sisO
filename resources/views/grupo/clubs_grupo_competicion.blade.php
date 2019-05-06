@extends('plantillas.main') 
@section('title') SisO - Lista de clubs
@endsection
 
@section('content')
<div class="form-row">
  @include('plantillas.menus.menu_gestion')

  <div class="margin_top col-md-9">
    <div class="">
      <div class="row">
        <div class="form-group col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
              <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
              <li class="breadcrumb-item"><a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}">Grupos</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $grupo->nombre_grupo }}</li>

            </ol>
          </nav>
        </div>
        <div class="form-group col-md-12">
          <nav class="navbar navbar-expand-lg menu">
            <ul class="navbar-nav btn-block">
              <li class="nav-item link competicion col-md-4">
                <a class="nav-link link active  col-md-12" href="{{ route('grupo.clubs_grupo_competicion_jugadores',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">1. Selecccionar Participantes <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item link competicion col-md-4">
                <a class="nav-link link  col-md-12" href="{{ route('grupo.fechas_grupo_competicion',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">2. Crear fechas</a>
              </li>
              <li class="nav-item link competicion col-md-4">
                <a class="nav-link link    col-md-12" href="{{ route('grupo.encuentros_grupo_competicion',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">3. Registrar encuentros</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="form-row container">
        <div class="form-group col-md-9">
          <h4 class="lista_sub">Lista de Participantes:</h4>
        </div>
        <div class="form-group col-md-3">
          <button type="button_add" class="btn btn-success btn-block" data-toggle="modal" data-target="#v">
                  <div class="button-div" style="width: 100px">
                      <i class="material-icons float-left" style="font-size: 22px">add</i>
                      <span class="letter-size">Agregar</span>
                  </div>
              </button> {{-- <button class="btn btn-primary " data-toggle="modal" data-target="#v">Agregar</button>          --}}
        </div>
      </div>
    @include('grupo.modal_agregar_jugadores_grupo')
      <div class="table-responsive-xl">
        <table class="mi_tabla table table-sm table-bordered">
          <thead>
            <th width="50">ID</th>
            <th colspan="2">Club</th>
            <th colspan="2">Jugador</th>
            <th width="50">Acciones</th>
          </thead>
          <tbody>

            @foreach($jugadores_participantes as $jugador)
            <tr>
              <td class="text-center">{{ $jugador->id_jugador }}</td>
              <td width="50" class="text-center"><img src="/storage/logos/{{ $jugador->logo}}" alt="" height="50" width="50"></td>
              <td width="100"> {{$jugador->alias_club }}</td>
              <td width="50"><img class="" src="/storage/fotos/{{ $jugador->foto_jugador}}" alt="" height=" 50px" width="50px"></td>
              <td>{{ $jugador->nombre_jugador." ".$jugador->apellidos_jugador }}</td>
              <td class="text-center"><a href="{{ route('grupo.eliminar_jugador',[$jugador->id_grupo,$jugador->id_seleccion,$fase->id_fase]) }}"><i title="Eliminar" class="material-icons delete_button">
                  delete
                  </i></a></td>

            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
 
@section('scripts') 
{!! Html::script('/js/filtrar_por_nombre.js') !!} 
{!! Html::script('/js/validacion_ajax_disc_reg.js')
!!} {!! Html::script('/js/checkbox.js') !!}
@endsection