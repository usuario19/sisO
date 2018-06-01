@extends('plantillas.main')

@section('title')
    SisO - Mis Clubs
@endsection

@section('content')
<h1>Gestiones en la que participo: </h1>
  <div class="table-responsive-xl">
    @foreach($mis_clubs as $club)
    <table class="table table-sm">
      
        <thead>
          <!--th width="50px">ID</th-->
          <tr>
              <!--td rowspan="{{ count($club->club->inscripciones)+1 }}">{{ $club->id_adminClub}}</td-->
              <!--td rowspan="{{ count($club->club->inscripciones) }}"-->
              <td>
                <img class="rounded mx-auto d-block" src="/storage/logos/{{ $club->club->logo }}" alt="" height=" 100px" width="100px">
              </td>
              <td colspan="4">
                <p class="display-4" style="font-size:40px ">{{ $club->club->nombre_club}}</p>
              </td>
          </tr>
          <tr class="table-primary">
            <th>Gestion</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th colspan="2"></th>
          </tr>
          
        </thead>
        <tbody>
          
            
            <tr>  
              @foreach($club->club->inscripciones->sortByDesc('id_inscripcion') as $inscripcion)
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
                        Inscribirse en disciplinas
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

                                @if(count($participacion->disciplina->club_participaciones->where('id_gestion',$inscripcion->gestion->id_gestion)->where('id_club',$club->club->id_club)) == 0)

                                  {!! Form::checkbox('id_disciplinas[]',$participacion->disciplina->id_disc, false, ['id'=>'disc'.$club->club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc,'class'=>'check_us']) !!}

                                  <img src="/storage/foto_disc/{{ $participacion->disciplina->foto_disc }}" alt="" width="50px" height="50px">

                                  @if($participacion->disciplina->categoria == 1)
    
                                  {!! Form::label('disc'.$club->club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc,$participacion->disciplina->nombre_disc. " "."(Mujeres)", []) !!}
                                  @elseif($participacion->disciplina->categoria == 2)
                                  {!! Form::label('disc'.$club->club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc,$participacion->disciplina->nombre_disc. " "."(Varones)", []) !!}
                                  @else
                                  {!! Form::label('disc'.$club->club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc,$participacion->disciplina->nombre_disc. " "."(Mixto)", []) !!}
                                  @endif
                                  <br>
                                  @else
                                  
                                  {!! Form::checkbox('check','0', true, ['class'=>'check_us','disabled']) !!}

                                    <img src="/storage/foto_disc/{{ $participacion->disciplina->foto_disc }}" alt="" width="50px" height="50px">

                                  @if($participacion->disciplina->categoria == 1)
    
                                  {!! Form::label('disc',$participacion->disciplina->nombre_disc. " "."(Mujeres)", []) !!}
                                  @elseif($participacion->disciplina->categoria == 2)
                                  {!! Form::label('disc',$participacion->disciplina->nombre_disc. " "."(Varones)", []) !!}
                                  @else
                                  {!! Form::label('disc',$participacion->disciplina->nombre_disc. " "."(Mixto)", []) !!}
                                  @endif
                                  <br>
                                @endif
    
                              @endforeach
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              {!! Form::submit('Inscribirse', ['class'=>'btn btn-primary']) !!}
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
          
        </tbody>
    </table>
    @endforeach
  </div>
@endsection