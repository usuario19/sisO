@extends('plantillas.main') 
@section('title') SisO - Lista de clubs
@endsection
 
@section('content')
<div class="form-row">
  @include('plantillas.menus.menu_gestion')

  <div class="margin_top col-md-9">
    <div class="">
      <div class="card-">
        <div class="row">
          <div class="form-group col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
                <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $fase->nombre_fase }}</li>

              </ol>
            </nav>
          </div>
          <div class="form-group col-md-12">
              <nav class="navbar navbar-expand-lg menu">
                  <ul class="navbar-nav btn-block">
                    <li class="nav-item link jugador col-md-4">
                      <a class="nav-link link  col-md-12" href="{{ route('fase.clubs_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">1. Selecccionar Clubs <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item link jugador col-md-4">
                      <a class="nav-link link active col-md-12" href="{{ route('fase.fechas_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">2. Crear fechas</a>
                    </li>
                    <li class="nav-item link jugador col-md-4">
                      <a class="nav-link link   col-md-12" href="{{ route('fase.encuentros_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">3. Registrar encuentros</a>
                    </li>
                  </ul>
      
                </nav>
            {{-- <div class="dropdown">
              <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i title="Configuracion" class="material-icons delete_button">
                    settings
                    </i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('fase.clubs_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Clubs</a>
                <a class="dropdown-item" href="{{ route('fase.fechas_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Fechas</a>
                <a class="dropdown-item" href="{{ route('fase.encuentros_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Encuentros</a>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
      <div class="">
        <div class="row container">
          <div class="form-group col-md-9">
            <h4 class="lista" style="font-size:20px">Lista de Fechas:</h4>
          </div>
          <div class="form-group col-md-3">
              <button type="button_add" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modalFecha">
                  <div class="button-div" style="width: 100px">
                      <i class="material-icons float-left" style="font-size: 22px">add</i>
                      <span class="letter-size">Agregar</span>
                  </div>
              </button>
          </div>
        </div>
        @include('fechas.modal_reg_fecha_eliminacion')
        <table class="table mi_tabla table-sm table-bordered" id="tablas_fechas_competicion">
          <thead>
            <th width="50px">ID</th>
            <th>Nombre</th>
            <th colspan="2">Acciones</th>
          </thead>
          <tbody>
            @foreach ($fechas as $fecha)
            <tr>
              <td class="text-center">{{ $fecha->id_fecha}}</td>
              <td>{{ $fecha->nombre_fecha}}</td>
              <td class="text-center"  width="50px"><a href=""><i title="Editar" class="material-icons delete_button">edit</i></a></td>
              <td class="text-center"  width="50px"><a href=""><i title="Eliminar" class="material-icons delete_button">delete</i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection