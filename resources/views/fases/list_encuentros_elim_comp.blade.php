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
<div class="container"> 
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
        <div id="clubs1" class="tab-pane fade">
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
            <td><a href="{{ route('fase.eliminar_club_eliminacion',[$fase->id_fase,$club->id_club_part]) }}"><i title="Eliminar" class="material-icons delete_button">delete</i></a></td>
           
          </tr>
        @endforeach
        </tbody>
      </table>
     </div>

     <div id="fechas1" class="tab-pane fade"> 
      <h4>Lista de Fechas:</h4>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFecha">Agregarr</button>
      @include('fechas.modal_reg_fecha_eliminacion') 
         <table class="table table-condensed">
             <thead>
               <th width="50px">ID</th>
               <th>Nombre</th>
               <th colspan="2" style="align-content: center">Acciones</th>
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

        <div id="encuentros1" class="tab-pane fade">
                <h4>Lista de Encuentros:</h4>
                @include('encuentro.modal_agregar_competicion_eliminacion')     
           
              @foreach ($fechas as $fecha)
                 <div>
                    <h4 style="text-align: center; ">{{ $fecha->nombre_fecha }}
                      <a href="{{ route('encuentro.fixture') }}"><i title="Fixture" class="material-icons delete_button">
                          assignment</i></a></h4>
                    
                 </div>
                 @foreach($fecha->encuentros as $encuentro)
                 <div class="row">
                    <div class="col-md-6">
                    @foreach ($encuentro->jugadores($encuentro->id_encuentro) as $jugador)
                          <img class="img-thumbnail" src="/storage/fotos/{{ $jugador->foto_jugador}}"  height=" 50px" width="50px">{{ $jugador->nombre_jugador}}
                    @endforeach   
                  </div>
                      <div class="col-md-6">
                          <p>
                              <a data-toggle="collapse" href={{ "#colapsado". $encuentro->id_encuentro }}  aria-expanded="false" aria-controls={{ "#colapsado". $encuentro->id_encuentro }}><i title="Descripcion" class="material-icons delete_button">
                                  description</i></a>
                              <a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}" ><i title="Eliminar" class="material-icons delete_button">delete
                              </i></a>
                              <a href="{{ route('encuentro.mostrar_resultado_competicion',$encuentro->id_encuentro) }}"><i title="Resultados" class="material-icons delete_button">
                                  collections_bookmark</i></a>
                            </p>
                            <div class="collapse" id={{ "colapsado".$encuentro->id_encuentro }} >
                                <table class="table table-responsive" style="width:50%">
                                    <tr>
                                      <th>Id:</th>
                                      <td>{{ $encuentro->id_encuentro }}</td>
                                    </tr>
                                    <tr>
                                      <th>Fecha:</th>
                                      <td>{{ $encuentro->fecha }}</td>
                                    </tr>
                                    <tr>
                                      <th>Hora:</th>
                                      <td>{{ $encuentro->hora}}</td>
                                    </tr>
                                    <tr>
                                        <th>Ubicacion:</th>
                                        <td>{{ $encuentro->ubicacion}}</td>
                                      </tr>
                                      <tr>
                                          <th>Detalle:</th>
                                          <td>{{ $encuentro->detalle}}</td>
                                        </tr>
                                  </table>
                              </div> 
                            </div>
                          </div>
                   @endforeach 
                 @endforeach
           </div>
    </div>
</div>
@endsection