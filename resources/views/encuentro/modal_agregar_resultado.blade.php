{!! Form::open(['route'=>'encuentro.reg_resultado','method' => 'POST']) !!}
        <!-- Modal -->
        <div class="modal fade" id="modalResultado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Resultados</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">  
                            <div style="display: none">
                                {!! Form::text('id_disc',$disciplina->id_disc, []) !!}
                                {!! Form::text('id_gestion',$gestion->id_gestion, []) !!}
                            </div>
                            @foreach($fechas as $fecha)
                                @foreach($fecha->encuentros as $encuentro)
                                @foreach ($encuentro->encuentro_club_participaciones as $participacion)
                                <div class="container col-md-12">
                                    <div class="card">
                                        <div style="display: none">
                                            {!! Form::text('id_encuentro', $encuentro->id_encuentro, []) !!}
                                            {!! Form::text('id_encuentro_club_part'.$participacion->id_encuentro_club_part, $participacion->id_encuentro_club_part, []) !!}

                                            {!! Form::text('id_club'.$participacion->id_encuentro_club_part, $participacion->id_encuentro_club_part, []) !!}
                                            
                                        </div>
                                        <div class="col-md-12">
                                            {!! Form::label('equipo'.$participacion->id_encuentro_club_part, 'Equipo', []) !!}
                                            {!! Form::text('equipo'.$participacion->id_encuentro_club_part, $participacion->club_participacion->club->nombre_club, ['class'=>'form-control','readonly'=>'true']) !!} 
                                        </div> 
                                        <div class="col-md-12">
                                            {!! Form::label('punto'.$participacion->id_encuentro_club_part, 'Puntos', []) !!}
                                            {!! Form::text('punto'.$participacion->id_encuentro_club_part, $participacion->puntos, ['class'=>'form-control']) !!} 
                                        </div> 
                                        <div class="col-md-12">
                                            {!! Form::label('observacion'.$participacion->id_encuentro_club_part, 'Observacion', []) !!}
                                            {!! Form::textarea('observacion'.$participacion->id_encuentro_club_part, $participacion->observacion, ['class'=>'form-control','rows'=>'2']) !!} 
                                        </div><br>  
                                    </div><br>
                                </div>
                                @endforeach
                                @endforeach
                            @endforeach
                        </div>
                    </div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            {!! Form::submit('Aceptar', ['class'=>'btn btn-primary']) !!}
                    </div>
                </div>      
            </div>
        </div>
 {!! Form::close() !!}
 
 @section('scripts')
   {!! Html::script('/js/cargar_contrincante_encuentro.js') !!}
@endsection