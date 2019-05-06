<div id="modalRegJugador" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR JUGADOR</h5>
        <button id="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<div class="container col-md-12">
						{!! Form::open(['route'=>'jugador.store','method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true,'id'=>'form-create-jug']) !!}
						<div class="form-row">
							<div class="form-group mx-auto" style="width: 200px">
									<div class="form-row">
										<div class="form-group col-md-12">
											<div class="contenedor_modal">
													<img id="imgOrigen2" class="rounded img-thumbnail mx-auto d-block float-left imgtam" src="/storage/fotos/usuario-sin-foto.png" alt="" {{--  style="height=200px ; width=200px"  --}}>
													<div id="divtexto2">
														<a id="btnCancelar2" class="btn btn-outline-dark button noVista">
																<span class="btn_hover ">
																		<i id="btnCancelar2" class="material-icons float-left" style="color:white">clear</i>
																</span>
														</a>
														<a id="texto2" class="btn btn-dark button vista">
															<span class="btn_hover ">
																	<i id="texto2" class="material-icons float-left" style="color:white">edit</i>
															</span>
														</a>
													</div>
											</div>
										</div>
									</div>
									<div class="form-row col-md-12">
											<div class="form-group {{ $errors->has('foto_admin') ? 'siError':'' }}">
													{!! Form::file('foto_jugador', ['class'=>'upload','id'=>'input2', 'style'=>'display:none']) !!}
													<div class="form-row errorLogin">
															<span id="error_foto2">{{ $errors->has('foto_jugador') ? $errors->first('foto_jugador'):'' }}</span>
													</div>
											</div>
									</div>
							</div>
							<div class="form-group col-md-8" >
											<div class="noVista">
													<h6 class="display-6 ">{!! Form::label('id_club', 'Club:', []) !!}</h6>
													{!! Form::text('id_club', $club->id_club , ['class' =>'form-control']) !!}
											</div>
											@include('plantillas.forms.form_reg_jugador')
							</div>
						</div>
				</div>
				</div>
      <div class="modal-footer">
					<div class="form-row col-md-9">
						<div class="form-group col-md-6">
								{!! Form::submit('Aceptar', ['class'=>'btn btn_aceptar btn-block','id'=>'buttonReg']) !!}
							</div>
							<div class="form-group col-md-6">
								<a href="" class="btn btn-block btn-outline-secondary" data-dismiss="modal" id="buttonClose">Cancelar</a>
							</div>
					</div>
        		{!! Form::close() !!}
      </div>
		</div>
	</div>
</div>
 </div>
</div>