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
        <a class="dropdown-item" href="{{ route('fase.clubs_eliminacion_competicion',[ $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Clubs</a>
        <a class="dropdown-item" href="{{ route('fase.fechas_eliminacion_competicion',[ $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Fechas</a>
        <a class="dropdown-item" href="{{ route('fase.encuentros_eliminacion_competicion',[ $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Encuentros</a>
      </div>
</div>
       <div class="container">
            <h4>Lista de Encuentros:</h4>
            //@include('encuentro.modal_agregar_competicion_eliminacion')     
       
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

@endsection
