<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	{!! Form::open(['route'=>'jugador.store','method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true]) !!}

		<div class="container col-md-12">
		
			<div class="float-sm-left col-md-4">
				<div class="form-row">
					<div id="contenedor" class="form-group col-md-12">
						<img id="imgOrigen" class="rounded mx-auto d-block float-left" src="/storage/fotos/usuario-sin-foto.png" alt="" height="200px" width="200px">
						<img id="imgParcial" height="200px" width="200px" class="noVista" src="" alt="">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						
						<div id="div_file">
							<img id="texto" src="/storage/fotos/subir.png"  alt="">
							{!! Form::file('foto_jugador', ['class'=>'upload','id'=>'input']) !!}
						</div>
					</div>
					<div class="form-group col-md-6" id="content" style="">
						<div><img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png"  alt=""></div>
					</div>
				</div>

			</div>

			<div class="float-sm-left col-md-8" >
				<div class="col-md-12">
					<table class="table table-sm ">
					  <thead></thead>
					  <tbody>
					  	<tr>
							<th><h6 class="display-6 ">{!! Form::label('clubs', 'Club:', []) !!}</h6></th>
					      	<td colspan="2">{!! Form::text('clubs', $mi_club->id_club , ['class' =>'form-control']) !!}</td>
						</tr>
					    <tr>  
						  @include('plantillas.forms.form_reg_jugador')
						  
					    </tr>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!! Form::submit('Registrar Jugador', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
	

 	  