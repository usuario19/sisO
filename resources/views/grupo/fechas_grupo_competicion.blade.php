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
                <a class="nav-link link   col-md-12" href="{{ route('grupo.clubs_grupo_competicion_jugadores',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">1. Selecccionar Participantes <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item link competicion col-md-4">
                <a class="nav-link link active col-md-12" href="{{ route('grupo.fechas_grupo_competicion',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">2. Crear fechas</a>
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
          <h4 class="lista_sub">Lista de Fechas:</h4>
        </div>
        <div class="form-group col-md-3">
            <button type="button_add" class="btn btn-success btn-block" data-toggle="modal" data-target="#modalFecha">
                <div class="button-div" style="width: 100px">
                    <i class="material-icons float-left" style="font-size: 22px">add</i>
                    <span class="letter-size">Agregar</span>
                </div>
            </button>
          {{--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFecha">Agregar</button>  --}}
        </div>
      </div>
  @include('fechas.modal_registrar_fecha')
      <div class="table-responsive-xl">
        <table class="mi_tabla table table-sm table-bordered">
          <thead>
            <th width="50">ID</th>
            <th>Nombre</th>
            <th colspan="2">Acciones</th>
          </thead>
          <tbody id="tablas_fechas_competicion">
            @foreach ($fechas as $fecha)
            <tr>
              <td>{{ $fecha->id_fecha}}</td>
              <td>{{ $fecha->nombre_fecha}}</td>
              <td width="50"><a href=""><i title="Editar" class="material-icons delete_button">
                      edit
                      </i></a>
              </td>
              <td width="50">
                <a href=""><i title="Eliminar" class="material-icons delete_button">
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