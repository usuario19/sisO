@extends('plantillas.main')

@section('title')
    SisO - Lista de clubs
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="container">
     <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
          <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $fase->nombre_fase }}</li>
        </ol>
      </nav>
</div>
<div class="dropdown container">
  <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Configuracion
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{ route('fase.clubs_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Clubs</a>
    <a class="dropdown-item" href="{{ route('fase.fechas_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Fechas</a>
    <a class="dropdown-item" href="{{ route('fase.encuentros_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Encuentros</a>
  </div>
</div> 
    <div class="card">
      <h4>Lista de Fechas:</h4>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFecha">Agregar</button>
      @include('fechas.modal_reg_fecha_eliminacion') 
         <table class="table table-condensed" id="tablas_fechas_competicion">
             <thead>
               <th width="50px">ID</th>
               <th>Nombre</th>
               <th colspan="2">Acciones</th>
             </thead>
             <tbody>
                @foreach ($fechas as $fecha)
                 <tr>    
                   <td>{{ $fecha->id_fecha}}</td>
                   <td>{{ $fecha->nombre_fecha}}</td>
                   <td><a href=""><i title="Editar" class="material-icons delete_button">edit</i></a></td>
                   <td><a href=""><i title="Eliminar" class="material-icons delete_button">delete</i></a></td>
                 </tr>
               @endforeach            
             </tbody>
         </table>
     </div>
@endsection