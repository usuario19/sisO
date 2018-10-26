@extends('plantillas.main')

@section('title')
    SisO - Lista de clubs
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="content">
     <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
          <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $fase->nombre_fase }}</li>
        </ol>
      </nav>
</div>
<div class="content"> 
    <ul id="tabsJustified" class="nav nav-tabs">
        <li class="nav-item">
          <a href="" data-target="#clubs1" data-toggle="tab" class="nav-link active">Clubs</a></li>
        <li class="nav-item">
          <a href="" data-target="#fechas1" data-toggle="tab" class="nav-link">Fechas</a></li>
        <li class="nav-item">
            <a href="" data-target="#encuentros1" data-toggle="tab" class="nav-link">Encuentros</a></li>
      
    </ul>
    <br>
    <div id="tabsJustifiedContent" class="tab-content">
        <div id="clubs1" class="tab-pane fade active show">
          <div style="float: left;" class="form-row col-md-12 form-inline">
              <h4>Lista de Clubs:</h4>
              <button class="btn btn-primary " data-toggle="modal" data-target="#v">
                  Agregar
                </button>
          </div>
              @include('fases.modal_agregar_equipos_eliminacion') 
              <table class="table table-condensed">
                  <thead>
                    <th width="50px">ID</th>
                    <th>Logo</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                  </thead>
                  <tbody>
        @foreach($clubs as $club)
          <tr>
            <td>{{ $club->id_club }}</td>
            <td><img class="img-thumbnail" src="/storage/logos/{{ $club->logo}}" alt="" height=" 50px" width="50px"></td>
            <td>{{ $club->nombre_club }}</td>
            <td><a href="{{ route('fase.eliminar_club_eliminacion',[$fase->id_fase,$club->id_club_part]) }}"><i title="Eliminar" class="material-icons">delete</i></a></td>
           
          </tr>
        @endforeach
        </tbody>
      </table>
     </div>
     <div id="fechas1" class="tab-pane fade"> 
      <h4>Lista de Fechas:</h4>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFecha">Agregar</button>
      @include('fechas.modal_registrar_fecha') 
         <table class="table table-condensed">
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
                   <td><a href=""><i title="Editar" class="material-icons">edit</i></a></td>
                   <td><a href=""><i title="Eliminar" class="material-icons">delete</i></a></td>
                 </tr>
               @endforeach            
             </tbody>
         </table>
     </div>
        <div id="encuentros1" class="tab-pane fade">
            <h4>Lista de Encuentros:</h4>
            @include('encuentro.modal_agregar_encuentro_eliminacion') 
            @foreach ($fechas as $fecha)
               <div>
                  <h4 style="text-align: center; ">{{ $fecha->nombre_fecha }}</h4>
               </div>
               <table class="table table-condensed">
                   <thead>
                     <th width="50px">ID</th>
                     <th colspan="2" style="text-align: center;">Equipos</th>
                     <th>Fecha</th>
                     <th>Hora</th>
                     <th>Ubicacion</th>
                     <th>Detalle</th>
                     <th colspan="3">Acciones</th>
                   </thead>
                   <tbody>
                     @foreach($fecha->encuentros as $encuentro)
                       <tr>
                         <td>{{ $encuentro->id_encuentro }}</td> 
                           @foreach ($encuentro->encuentro_club_participaciones as $equipo)
                             <td><img class="img-thumbnail" src="/storage/logos/{{ $equipo->club_participacion->club->logo}}" alt="{{ $equipo->club_participacion->club->nombre_club}}" height=" 50px" width="50px">{{ $equipo->club_participacion->club->nombre_club}}</td>
                           @endforeach
                         <td>{{ $encuentro->fecha}}</td>
                         <td>{{ $encuentro->hora}}</td>
                         <td>{{ $encuentro->ubicacion}}</td>
                         <td>{{ $encuentro->detalle}}</td>
                        <td><a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}"><i title="Eliminar" class="material-icons">delete</i></a></td>
                         <td><a href="{{ route('encuentro.fixture') }}"><i title="Fixture" class="material-icons">list</i></a></td>
                         <td><a href="{{ route('encuentro.mostrar_resultado',$encuentro->id_encuentro) }}"><i title="Resultado" class="material-icons">list</i></a></td>
                       </tr>
                     @endforeach            
                   </tbody>
               </table>
            @endforeach
           </div>
    </div>
</div>
@endsection