{!! Form::open(['route'=>'encuentro.store','method' => 'POST']) !!}
<!-- Modal -->
<div class="modal fade" id="modalEncuentro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Agregar encuentro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
            </div>
            <div class="modal-body">

                <h6>Seleccione los clubs a enfrentarse:</h6><br>

                <div class="form-row">
                    <div style="display: none">
                        {!! Form::text('id_gestion', $gestion->id_gestion, []) !!} 
                        {!! Form::text('id_disc', $disciplina->id_disc, []) !!} 
                        {!! Form::text('id_fase',
                        $fase->id_fase, ['id'=>'id_fase']) !!}
                    </div>
                    <div class="col-md-5">
<<<<<<< HEAD
                        {!! Form::select('id_club1', $clubsParaEncuentro, null,['onchange'=>'cargarContrincantesEliminacion()','id'=>'club1','placeholder'=>'Equipo 1','class'=>'form-control'])
                        !!}
=======
                        {!! Form::select('id_club1', $clubsParaEncuentro, null,['onchange'=>'cargarContrincantesEliminacion()','id'=>'club1','placeholder'=>'seleccione','class'=>'form-control custom-select','required'=>'required']) !!}
>>>>>>> refs/remotes/origin/master
                    </div>
                    <div class="col-md-2">
                        <h2 style="text-align: center;">Vs.</h2>
                    </div>
                    <div class="col-md-5">
<<<<<<< HEAD
                        {!! Form::select('id_club2', $clubsParaEncuentro, null, ['id'=>'club2','placeholder'=>'Equipo 2','class'=>'form-control'])
                        !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        {!! Form::label('ubicacion', 'Ubicacion', []) !!} {!! Form::select('id_centro',$centros,null, [{{--  'placeholder'=>'seleccione',  --}}'class'=>'form-control'])
                        !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('id_fecha', 'Fecha', []) !!} {!! Form::select('id_fecha',$fechas2, null,[{{--  'placeholder'=>'seleccione',  --}}'class'=>'form-control'])
                        !!}
=======
                        {!! Form::select('id_club2', $clubsParaEncuentro, null, ['id'=>'club2','placeholder'=>'seleccione','class'=>'form-control custom-select','required'=>'required']) !!}
                    </div>
                </div>
                <div class="form-row">
                   <div class="col-md-6">
                        {!! Form::label('ubicacion', 'Ubicacion', []) !!}
                        {!! Form::select('id_centro',$centros,null, ['placeholder'=>'seleccione','class'=>'form-control custom-select','required'=>'required']) !!}     
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('id_fecha', 'Fecha', []) !!}
                        {!! Form::select('id_fecha',$fechas2, null,['placeholder'=>'seleccione','class'=>'form-control custom-select','required'=>'required']) !!}
>>>>>>> refs/remotes/origin/master
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        {!! Form::label('fechas', 'Fecha', []) !!} {!! Form::date('fecha', \Illuminate\Support\Carbon::now(), ['class'=>'form-control'])
                        !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('hora', 'Hora', []) !!} {!! Form::time('hora', \Illuminate\Support\Carbon::now()->format('H:i'), ['class'=>'form-control'])
                        !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        {!! Form::label('detalle', 'Detalle', []) !!} {!! Form::textarea('detalle',null, ['class'=>'form-control','rows'=>4]) !!}
                    </div>
                </div>
            </div>

            <div class="modal-footer">
<<<<<<< HEAD
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <button class="button_spiner btn btn-block btn-success" type="button" disabled style="display:none">
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            Cargando...
                        </button> {!! Form::submit('aceptar', ['class'=>'btn btn-block btn_aceptar'])
                        !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary btn_cerrar']) !!}
                    </div>
                </div>
=======
                    <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn-primary btn_aceptar']) !!}
                                </div>
                            <div class="form-group col-md-6">
                        {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary']) !!}
                        </div>
                        
                        </div>
>>>>>>> refs/remotes/origin/master
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!} 
@section('scripts') {!! Html::script('/js/cargar_contrincante_encuentro_eliminacion.js') !!}
@endsection