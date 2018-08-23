@extends('plantillas.main')
@section('title')
	SisO: Registrar Admin
@endsection
@section('content')
<div class="container col-md-10">
	<h1 class="display-4">Registrar Admin</h1>
	<br>
</div>

<div class="container col-md-9">
	
	{!! Form::open(['route'=>'administrador.store','method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true] ) !!}

		<div class="form-row">
			<div class="form-group col-md-4">
				<div class="form-row">
					<div class="form-group col-md-12">
						<div id="contenedor">
							<img id="imgOrigen" class="rounded mx-auto d-block float-left" src="/storage/fotos/usuario-sin-foto.png" alt="" height="200px" width="200px">
							
							<div id="divtexto">
								
								<img id="texto" src="/storage/fotos/subir.png"  alt="">
						
								<img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png"  alt="">
								
							</div>
						</div>
						{{-- <img id="imgParcial" height="200px" width="200px" class="noVista" src="" alt=""> --}}
						<!--img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png" alt=""-->
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-5 {{ $errors->has('foto_admin') ? 'siError':'' }}">
						
						<div id="div_file">
							{!! Form::file('foto_admin', ['class'=>'upload','id'=>'input']) !!}
						</div>
						 
					</div>
					<div class="form-row errorLogin">
		    			<span>
		    				<h6 id="error_foto">{{ $errors->has('foto_admin') ? $errors->first('foto_admin'):'' }}</h6>
		    			</span>
		 			</div>
				</div>
			</div>
			
			<div class="form-group col-md-8" >

				@include('plantillas.forms.form_reg_admin')
				<br>
				<div class="form-row">
				<div class="form-group col-md-12">
					{!! Form::submit('Crear cuenta', ['class'=>'btn btn-primary','id'=>'buttonReg']) !!}
				</div>
			</div>
		</div>
	</div>
		
	{!! Form::close() !!}
</div>
@endsection
@section('scripts')
  {!! Html::script('/js/vista_previa.js') !!}
  {!! Html::script('/js/filtro_ajax_form.js') !!}

@endsection