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
				{!! Form::open(['route'=>'jugador.store','method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true]) !!}
		

		<div class="container col-md-12">
			
			<div class="form-row">
				<div class="form-group" style="min-width: 200px">
						<div class="form-row">
							<div class="form-group col-md-12" style="margin:0%">
								<div class="contenedor">
									<img id="imgOrigen2" class="rounded mx-auto d-block float-left imgtam" src="/storage/fotos/usuario-sin-foto.png" alt="" {{--  style="height=200px ; width=200px"  --}}>
									
											<div id="divtexto2">
													<button id="btnCancelar2" class="btn btn-outline-dark button noVista">
															<span class="btn_hover">
																	<i id="btnCancelar2" class="material-icons float-left">clear</i>	
															</span></button>
													
												<button id="texto2" class="btn btn-dark button vista">
													<span class="btn_hover ">
															<i id="texto2" class="material-icons float-left">edit</i>
													</span></button>
											</div>
									{{--  <div id="divtexto2">
										
										<img id="texto2" src="/storage/fotos/subir.png"  alt="">
								
										<img id="btnCancelar2" class="noVista" src="/storage/fotos/cancelar.png"  alt="">
										
									</div>  --}}
								</div>
							</div>
						
						<div class="form-row">
								<div class="form-group col-md-12 {{ $errors->has('foto_admin') ? 'siError':'' }}">
									<div style="display:none">
										{!! Form::file('foto_jugador', ['class'=>'upload','id'=>'input2']) !!}
									</div>
								</div>
								<div class="form-row errorLogin">
										<span>
											<h6 id="error_foto2">{{ $errors->has('foto_jugador') ? $errors->first('foto_jugador'):'' }}</h6>
										</span>
								</div>
							</div>
						</div>
					</div>

			<div class="float-sm-left col-md-8" >
				<div class="col-md-12">
					<table class="table table-sm ">
					  <thead></thead>
					  <tbody>
					  	<tr>
							<div class="noVista">
									<h6 class="display-6 ">{!! Form::label('id_club', 'Club:', []) !!}</h6>
									{!! Form::text('id_club', $club->id_club , ['class' =>'form-control']) !!}
							</div>
					{{--  	</tr>
					    <tr>   --}} 
						  @include('plantillas.forms.form_reg_jugador')
						  
					    </tr>
					  </tbody>
					</table>
					<div class="form-row">
							<div class="form-group col-md-6">
							{{--  	{!! Form::submit('Crear cuenta', ['class'=>'btn btn-primary btn-block','id'=>'buttonReg']) !!}
								  --}}
							<div class="form-group col-md-6">
								<a href="" class="btn btn-block btn-secondary" data-dismiss="modal" id="buttonClose">Cancelar</a>
							</div>
						</div>
				</div>
			</div>
		</div>
		
		
		</div>
      <div class="modal-footer">
       {{--   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        {!! Form::submit('Registrar Jugador', ['class'=>'btn btn-primary']) !!}  --}}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
 </div>