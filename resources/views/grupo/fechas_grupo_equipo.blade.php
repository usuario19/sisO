@extends('plantillas.main')

@section('title')
    SisO - Lista de clubs
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
        <div class="container">
            <div class="row">
            <div class="form-group col-md-11">
                <nav aria-label="breadcrumb" >
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
                        <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $fase->nombre_fase }}</li>
                        <li class="breadcrumb-item"><a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}">Grupos</a></li>         
                        <li class="breadcrumb-item active" id="id_grupo" value="{{ $grupo->id_grupo }}"  aria-current="page">{{ $grupo->nombre_grupo }}</li>
                        
                      </ol>
                    </nav>
            </div>
            <div class="form-group col-md-1">
                <div class="dropdown" >
                    <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i title="Configuracion" class="material-icons delete_button">
                            settings
                            </i></a> 
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('grupo.clubs_grupo_equipo',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Clubs</a>
                        <a class="dropdown-item" href="{{ route('grupo.fechas_grupo_equipo',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Fechas</a>
                        <a class="dropdown-item" href="{{ route('grupo.encuentros_grupo_equipo',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Encuentros</a>
                       </div>
                  </div>
              </div>
            </div>
          </div>
  <div class="container">
  <div class="card">
<div class="row container">
  <div class="form-group col-md-10"><h4>Lista de Fechas:</h4></div>
  <div class="form-group col-md-2">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFecha">Agregar</button></div>
</div>
    @include('fechas.modal_registrar_fecha') 
       <table class="table table-condensed">
           <thead>
             <th width="50px">ID</th>
             <th>Nombre</th>
             <th>Acciones</th>
           </thead>
           <tbody>
              @foreach ($fechas as $fecha)
               <tr>    
                 <td>{{ $fecha->id_fecha}}</td>
                 <td>{{ $fecha->nombre_fecha}}</td>
                 <td><a href=""><i title="Eliminar" class="material-icons delete_button">
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

   