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
        @include('encuentro.modal_agregar_competicion')    
        @include('encuentro.modal_agregar_resultado_competicion')     
        @include('encuentro.modal_ver_resultado_competicion')     

        <div class="card"> 
    <div style="float: left;" class="form-row col-md-12 form-inline">
        <h4>Lista de Encuentros:</h4>
      </div>
      @foreach ($fechas as $fecha)
         <div>
            <h4 style="text-align: center; ">{{ $fecha->nombre_fecha }}
              <a href="{{ route('encuentro.fixture') }}"><i title="Fixture" class="material-icons delete_button">
                  assignment</i></a></h4>
            
         </div>
        <table class="table table-condensed">
          <thead>
            <th>Participantes</th>
            <th>Acciones</th>
          </thead>
          <tbody>
            
            @foreach($fecha->encuentros as $encuentro)
            <tr>
            <td>
              @foreach ($encuentro->jugadores($encuentro->id_encuentro) as $jugador)
                <img class="img-thumbnail" src="/storage/fotos/{{ $jugador->foto_jugador}}"  height=" 50px" width="50px">{{ $jugador->nombre_jugador}}
              @endforeach
            </td>
            <td>
                    <a data-toggle="collapse" href={{ "#colapsado". $encuentro->id_encuentro }}  aria-expanded="false" aria-controls={{ "#colapsado". $encuentro->id_encuentro }}><i title="Descripcion" class="material-icons delete_button">
                        description</i></a>
                    
                  @if ($encuentro->tiene_resultado_competicion($encuentro->id_encuentro) == 1)
                    <a href=" " onclick="VerResultadoCompeticion({{ $encuentro->id_encuentro }});"  class="button_delete" data-toggle="modal" data-target="#modalVerResultado">
                      <i title="Ver resultados" class="material-icons delete_button button_redirect">
                        collections_bookmark
                      </i>
                    </a>
                  @else
                  <a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}" ><i title="Eliminar" class="material-icons delete_button">delete
                    </i></a>
                 
                    <a href=" " onclick="RegistrarResultadoCompeticion({{ $encuentro->id_encuentro }});"  class="button_delete" data-toggle="modal" data-target="#modalResultado">
                      <i title="Registrar resultados" class="material-icons delete_button button_redirect">
                        collections_bookmark
                      </i>
                    </a>
                  @endif
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
                                    
                                    <td><a href="{{ $encuentro->centro->ubicacion_centro}}">
                                        <i class="material-icons float-left">location_on</i>
                                        <span class="letter-size">{{$encuentro->centro->nombre_centro}}</span>
                                    </a></td>
                                  </tr>
                                  <tr>
                                      <th>Detalle:</th>
                                      <td>{{ $encuentro->detalle}}</td>
                                    </tr>
                              </table>
                          </div>
            </td> 
          </tr>
            @endforeach 
          
          </tbody>
        </table>  
         @endforeach 
</div>
</div>
@endsection
 
