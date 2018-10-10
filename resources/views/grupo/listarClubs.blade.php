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
         <li class="breadcrumb-item"><a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}">Grupos</a></li>         
         <li class="breadcrumb-item active" aria-current="page">{{ $grupo->nombre_grupo }}</li>
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
          <button class="btn btn-primary " data-toggle="modal" data-target="#v">Agregar</button>
      </div>
        @include('grupo.modal_agregar_equipos') 
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
                  <td><a href="{{ route('grupo.eliminar_club',[$club->id_grupo,$club->id_club_part]) }}" class="btn btn-danger">Eliminar</a></td>
                 
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
           <th colspan="2" style="text-align: center">Acciones</th>
         </thead>
         <tbody>
            @foreach ($fechas as $fecha)
             <tr>    
               <td>{{ $fecha->id_fecha}}</td>
               <td>{{ $fecha->nombre_fecha}}</td>
               <td><a href="" class="btn btn-success">Editar</a></td>
               <td>
                 <a href=""><img src="icons\baseline_delete_black_18dp" alt=""></a></td>
             </tr>
           @endforeach            
         </tbody>
     </table>
 </div>
    <div id="encuentros1" class="tab-pane fade">
      <h4>Lista de Encuentros:</h4>
      @include('encuentro.modal_agregar_encuentro')     
 
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
             <th>Acciones</th>
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
                 <td><a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}"><i title="Eliminar" class="material-icons">
                    delete
                    </i></a></td>
                 <td><a href="{{ route('encuentro.fixture') }}" class="btn btn-danger">fixture</a></td>
                 <td><a href="{{ route('encuentro.mostrar_resultado',$encuentro->id_encuentro) }}" class="btn btn-success">Resultado</a></td>
               </tr>
             @endforeach            
           </tbody>
       </table>
    @endforeach
    </div>
  </div>
</div>
@endsection