@extends('plantillas.main')

@section('title')
    SisO - Lista de clubs
@endsection

@section('submenu')
  @include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="container">
        <div class="card">
    <div class="content">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
            <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
            <li class="breadcrumb-item"><a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}">Grupos</a></li>         
            <li class="breadcrumb-item active" aria-current="page">{{ $grupo->nombre_grupo }}</li>
        </ol>
        </nav>
    </div>
<div class="dropdown">
  <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Configuracion
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{ route('grupo.clubs_grupo_competicion',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Clubs</a>
        <a class="dropdown-item" href="{{ route('grupo.fechas_grupo_competicion',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Fechas</a>
        <a class="dropdown-item" href="{{ route('grupo.encuentros_grupo_competicion',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Encuentros</a>
      </div>
</div> 

<div class="container"> 
    <div style="float: left;" class="form-row col-md-12 form-inline">
    <h4>Lista de Fechas:</h4>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFecha">Agregar</button>
</div>
    @include('fechas.modal_registrar_fecha') 
      <div>
          <table class="table table-condensed">
              <thead>
                <th width="50px">ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
              </thead>
              <tbody id="tablas_fechas_competicion">
                  @foreach ($fechas as $fecha)
                  <tr>    
                    <td>{{ $fecha->id_fecha}}</td>
                    <td>{{ $fecha->nombre_fecha}}</td>
                    <td><a href=""><i title="Editar" class="material-icons delete_button">
                      edit
                      </i></a>
                   
                      <a href=""><i title="Eliminar" class="material-icons delete_button">
                        delete
                        </i></a></td>
                  </tr>
                @endforeach            
              </tbody>
          </table>
      </div>
       
</div>
@endsection