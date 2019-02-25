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
                        <a class="dropdown-item" href="{{ route('fase.clubs_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Clubs</a>
                        <a class="dropdown-item" href="{{ route('fase.fechas_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Fechas</a>
                        <a class="dropdown-item" href="{{ route('fase.encuentros_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Encuentros</a>
                      </div>
          </div>
      </div>
    </div>
  </div>
<div class="container">
    <div class="card">
      <div class="row container">
        <div class="form-group col-md-10"><h4>Lista de Encuentros:</h4></div>
        <div class="form-group col-md-2">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEncuentro">
            Agregar
        </button>
      </div>
      </div>
            
            @include('encuentro.modal_agregar_encuentro_eliminacion') 
            @include('encuentro.modal_agregar_resultado') 
            @include('encuentro.modal_ver_resultado') 
            @foreach ($fechas as $fecha)
               <div>
                  <h4 style="text-align: center; ">{{ $fecha->nombre_fecha }}
                  <a href="{{ route('encuentro.fixture_porfecha',$fecha->id_fecha) }}">
                    <i title="Fixture" class="material-icons delete_button">assignment</i>
                  </a>
                </h4>
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
                         
                         <td><a href="{{ $encuentro->centro->ubicacion_centro}}" style="color: #EA4335">
                            <i class="material-icons float-left">location_on</i>
                            <span class="letter-size">{{ $encuentro->centro->nombre_centro}}</span>
                            </a>
                        </td>
                         <td>{{ $encuentro->detalle}}</td>
                          <td>
                              @if ($encuentro->tiene_resultado($encuentro->id_encuentro) == 1)

                              <a href=" " onclick="VerResultado({{ $encuentro->id_encuentro }});"  class="button_delete" data-toggle="modal" data-target="#modalVerResultado">
                                  <i title="Ver resultados" class="material-icons delete_button button_redirect">
                                    collections_bookmark
                                  </i>
                                </a>
                              @else
                              <a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}"><i title="Eliminar" class="material-icons delete_button">
                                delete</i></a>
                              
                                <a href=" " onclick="RegistrarResultado({{ $encuentro->id_encuentro }});"  class="button_delete" data-toggle="modal" data-target="#modalResultado">
                                  <i title="Registrar resultados" class="material-icons delete_button button_redirect">
                                    collections_bookmark
                                  </i>
                                </a>
                              @endif
                          </td>
                            
                        </tr>
                     @endforeach            
                   </tbody>
               </table>
            @endforeach
        </div>
    </div>
@endsection