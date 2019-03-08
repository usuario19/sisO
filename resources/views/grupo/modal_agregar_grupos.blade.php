<div class="modal fade" id="modalGrupo" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
              <div class="modal-content">
                      <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Agregar grupo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                      </div>
                      <div class="modal-body">
                        <div class="container col-md-11">
	                    {!! Form::open(['route'=>'grupo.store','metod'=>'POST','enctype'=>'multipart/formdata']) !!}	
                        <div class="form-row">
                                <div class="form-group col-md-12">
                                    {!! Form::label('grupos', 'Cantidad de grupos', []) !!}
                                    {!! Form::select('cant_grupos', ['1'=> '1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','10'=>'10'], null ,['placeholder'=>'seleccione...','id'=>'cant_grupos','onclick'=>'grupos()','onchange'=>'grupos()','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div style="display: none">
                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    {!! Form::text('id_fase', $fase->id_fase, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
                                                    {!! Form::text('id_gestion', $gestion->id_gestion, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
                                                    {!! Form::text('id_disc', $disciplina->id_disc, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
                                                </div>
                                        </div>	
                            </div>		
                            <div id="formGrupo1" style="display: none">
                                <div class="card">	
                                    <div class="card-body">
                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    {!! Form::label('nombre', 'Nombre', []) !!}
                                                    {!! Form::text('nombre',null, ['class'=>'nombre_grupo form-control','placeholder'=>'Nombre']) !!}
                                                </div>
                                            </div>	
                                    </div>	
                                </div>		
                            </div>
                            <br>
                            <div id="formGrupo2" style="display: none">
                                    @for ($i = 0; $i < 2; $i++)
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    {!! Form::label('nombre', 'Nombre', []) !!}
                                                    {!! Form::text('nombre'.$i,null, ['class'=>'nombre_grupo form-control','placeholder'=>'Nombre']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <br>
                                    @endfor	
                            </div>
                        
                            <div id="formGrupo3" style="display: none">
                                @for ($i = 2; $i < 5; $i++)
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    {!! Form::label('nombre'.$i, 'Nombre', []) !!}
                                                    {!! Form::text('nombre'.$i, null, ['class'=>'nombre_grupo form-control','placeholder'=>'Nombre']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <br>
                                @endfor		
                            </div>
                            <div id="formGrupo4" style="display: none">
                                @for ($i = 5; $i < 9; $i++)
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    {!! Form::label('nombre'.$i, 'Nombre', []) !!}
                                                    {!! Form::text('nombre'.$i, null, ['class'=>'nombre_grupo form-control','placeholder'=>'Nombre']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div> <br>
                                @endfor	
                            </div>
                            <div id="formGrupo5" style="display: none">
                                @for ($i = 9; $i < 14; $i++)
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    {!! Form::label('nombre'.$i, 'Nombre', []) !!}
                                                    {!! Form::text('nombre'.$i, null, ['class'=>'nombre_grupo form-control','placeholder'=>'Nombre']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                @endfor	
                            </div>
                            <div id="formGrupo10" style="display: none">
                                @for ($i = 14; $i < 24; $i++)
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                        {!! Form::label('nombre'.$i, 'Nombre', []) !!}
                                                        {!! Form::text('nombre'.$i, null, ['class'=>'nombre_grupo form-control','placeholder'=>'Nombre']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                @endfor		
                            </div>
                            </div>
                            
                                <div class="modal-footer">
                                        <div class="row col-md-12">
                                                <div class="form-group col-md-6">
                                                    {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn-primary btn_aceptar']) !!}
                                                    </div>
                                                <div class="form-group col-md-6">
                                            {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary']) !!}
                                            </div>
                                            
                                            </div>
                                </div>
                          {!! Form::close() !!}
                        </div>
                    </div>
                           
                      </div>                
                </div>
@section('scripts')
    {!! Html::script('/js/crearGrupo.js') !!}
@endsection