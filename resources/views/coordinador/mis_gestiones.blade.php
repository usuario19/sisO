@extends('plantillas.main')

@section('title')
    SisO - Mis Clubs
@endsection

@section('content')
<h1>Gestiones en la que participo: </h1>
  <table class="table table-condensed">
      <thead>
        <!--th width="50px">ID</th-->
        <th width="200px">Club</th>
        <th>Gestion</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th colspan="2">Acciones</th>
        
      </thead>
      <tbody>
        @foreach($mis_clubs as $club)
          <tr>
            <!--td rowspan="{{ count($club->club->inscripciones)+1 }}">{{ $club->id_adminClub}}</td-->
            


            <td rowspan="{{ count($club->club->inscripciones) }}">
                <div class="form-row"><h3 class="display-5">{{ $club->club->nombre_club}}</h3></div>
                <div class="form-row">
                  <img class="rounded mx-auto d-block" src="/storage/logos/{{ $club->club->logo }}" alt="" height=" 100px" width="100px">
                </div>
            </td>
            
            @foreach($club->club->inscripciones as $inscripcion)
                <td>
                  <div class="form-row">{{ $inscripcion->gestion->nombre_gestion }}</div>
                </td>
                <td>
                  <div class="form-row">{{ $inscripcion->gestion->fecha_ini }}</div>
                </td>
                <td>
                  <div class="form-row">{{ $inscripcion->gestion->fecha_fin }}</div>
                </td>
                
              
             
                <td>
                  {!! Form::open(['route'=>'disciplina.store_disc','method' => 'POST']) !!}
                  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#V{{ $inscripcion->gestion->id_gestion.$club->club->id_club }}">
                      Seleccionar disciplinas
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="V{{ $inscripcion->gestion->id_gestion.$club->club->id_club }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">{{ $inscripcion->gestion->nombre_gestion }} </h5>


                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <h6>Seleccione las disciplinas en las que participara:</h6><br>

                            <div style="display: none;"> 
                                {!! Form::text('id_club', $club->club->id_club, ['class'=>'form-control']) !!}
                                {!! Form::text('id_gestion', $inscripcion->gestion->id_gestion, ['class'=>'form-control']) !!}
                            </div>
                            <!--$inscripcion->gestion->participaciones muestra todos los id de las disciplinas-->
                            @foreach($inscripcion->gestion->participaciones as $participacion)

                                {!! Form::checkbox('id_disciplinas[]',$participacion->disciplina->id_disc, false, ['id'=>'disc'.$club->club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc]) !!}

                                {!! Form::label('disc'.$club->club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc,$participacion->disciplina->nombre_disc. " ".$participacion->disciplina->categoria, []) !!}
                                <br>

                            @endforeach
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            {!! Form::submit('Guardar Cambios', ['class'=>'btn btn-primary']) !!}
                          </div>
                        </div>
                      </div>
                    </div>
                    {!! Form::close() !!}
                </td>

                <td>
                  <a href="{{ route('disciplina.ver_disciplinas',[$club->club->id_club,$inscripcion->gestion->id_gestion]) }}" class="btn btn-success">Ver disciplinas</a>
                </td>
            </tr>
            @endforeach
          </tr>
        @endforeach
      </tbody>
  </table>
@endsection