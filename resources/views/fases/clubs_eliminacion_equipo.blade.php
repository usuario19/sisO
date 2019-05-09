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
                  <a class="nav-link link active col-md-12" href="{{ route('fase.clubs_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">1. Selecccionar Clubs <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item link jugador col-md-4">
                  <a class="nav-link link  col-md-12" href="{{ route('fase.fechas_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">2. Crear fechas</a>
                </li>
                <li class="nav-item link jugador col-md-4">
                  <a class="nav-link link   col-md-12" href="{{ route('fase.encuentros_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">3. Registrar encuentros</a>
                </li>
              </ul>

            </nav>
            {{--
            <div class="dropdown">
              <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i title="Configuracion" class="material-icons delete_button">
                  settings
                  </i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('fase.clubs_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Clubs</a>
                <a class="dropdown-item" href="{{ route('fase.fechas_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Fechas</a>
                <a class="dropdown-item" href="{{ route('fase.encuentros_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Encuentros</a>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
      <div class="">
        <div class="row container">
          <div class="form-group col-md-9">
            <h4 class="lista" style="font-size:20px">Lista de Clubs:</h4>
          </div>
          <div class="form-group col-md-3">
              <button type="button_add" class="btn btn-warning btn-block" data-toggle="modal" data-target="#v">
                  <div class="button-div" style="width: 100px">
                      <i class="material-icons float-left" style="font-size: 22px">add</i>
                      <span class="letter-size">Agregar</span>
                  </div>
              </button>
            {{-- <button class="btn btn-primary " data-toggle="modal" data-target="#v">
                Agregar
              </button> --}}
          </div>
        </div>
        @include('fases.modal_agregar_equipos_eliminacion')
        <div class="table-responsive-xl">

        <table class="mi_tabla table table-sm table-bordered">
          <thead>
            <th width="50px">ID</th>
            <th width="50px">Logo</th>
            <th>Nombre</th>
            <th>Acciones</th>
          </thead>
          <tbody>
            @foreach($clubs as $club)
            <tr>
              <td class="text-center">{{ $club->id_club }}</td>
              <td><img class="" src="/storage/logos/{{ $club->logo}}" alt="" height=" 50px" width="50px"></td>
              <td>{{ $club->nombre_club }}</td>
              <td class="text-center"  width="50px">
                <a href="{{ route('fase.eliminar_club_eliminacion',[$fase->id_fase,$club->id_club_part,$disciplina->id_disc]) }}">
              <i title="Eliminar" class="material-icons delete_button">delete</i></a></td>

            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('scripts')
{!! Html::script('/js/checkbox.js') !!}
{!! Html::script('/js/reset_inputs.js') !!}
{!! Html::script('/js/validacion_ajax_disc_reg.js') !!}
@endsection