@extends('plantillas.main')

@section('title')
    SisO - Lista de clubs
@endsection


@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    
  </div> 
</div>
{!! Form::open(['route'=>'encuentro.reg_resultado','method' => 'POST']) !!}
                   

                              
                                <div class="container col-md-6">
                                    @foreach ($encuentro->encuentro_club_participaciones as $participacion)
                                    <div class="card">
                                      <div style="display: none">
                                          {!! Form::text('id_encuentro', $encuentro->id_encuentro, []) !!}
                                          {!! Form::text('id_encuentro_club_part', $encuentro->id_encuentro, []) !!}
                                      </div>
                                      <div class="col-md-6">
                                          {!! Form::label('equipo'.$participacion->id_encuentro_club_part, 'Equipo', []) !!}
                                          {!! Form::text('equipo'.$participacion->id_encuentro_club_part,$participacion->club_participacion->club->nombre_club, ['class'=>'form-control']) !!} 
                                      </div> 
                                      <div class="col-md-6">
                                          {!! Form::label('punto'.$participacion->id_encuentro_club_part, 'Puntos', []) !!}
                                          {!! Form::text('punto'.$participacion->id_encuentro_club_part,$participacion->puntos, ['class'=>'form-control']) !!} 
                                      </div> 
                                      <div class="col-md-6">
                                          {!! Form::label('observacion'.$participacion->id_encuentro_club_part, 'Observacion', []) !!}
                                          {!! Form::text('observacion'.$participacion->id_encuentro_club_part, $participacion->observacion, ['class'=>'form-control']) !!} 
                                      </div><br>  
                                </div><br>
                                @endforeach                        
                                      <div class="col-md-6">
                              
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                 {!! Form::submit('Aceptar', ['class'=>'btn btn-primary']) !!}
                                </div></div>
                                
                                                       
                                
                         
 {!! Form::close() !!}
@endsection
