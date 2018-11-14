@extends('plantillas.main')
@section('title')
	SisO: Registrar Admin
@endsection
@section('content')
<div class="container col-md-10">

	<div id="mensaje" class="alert alert-success alert-dismissible show" role="alert" style="visibility: hidden">
	  <strong>El Usuario fue registrado exitosamente!!!!</strong>
	  <button type="button" class="close" aria-label="Close" onclick="document.getElementById('mensaje').style.visibility = 'hidden';">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>

	<h1 class="display-4">Registrar Admin</h1>
	<br>
</div>
<div class="container col-md-9">
	
	{!! Form::open(['method' => 'POST' ,'id'=>'form_create','enctype' => 'multipart/form-data', 'files'=>true] ) !!}
	
	<!-- {!! Form::open(['id'=>'form','method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true] ) !!} -->

	<!-- {!! Form::open(['id'=>'form']) !!} -->
		<div class="form-row">
			<div class="form-group col-md-5">
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
			
			<div class="form-group col-md-7" >

			@include('plantillas.forms.form_reg_admin')

			<div class="form-row">
		  		<div class="form-group col-md-6 {{ $errors->has('password') ? 'siError':'noError' }}">
		    		{!! Form::label('password', 'Contraseña', []) !!}	
					{!! Form::password('password', ['class' => 'form-control']) !!}
					<div class="form-group errorLogin">
					    
			    		<h6 id="error_password">{{ $errors->has('password') ? $errors->first('password'):'' }}</h6>
					    
			 	</div>
	    	</div>
		    	<div class="form-group col-md-6 {{ $errors->has('password_confirmation') ? 'siError':'noError' }}">
		    		{!! Form::label('password_confirmation', 'Confirma tu contraseña', []) !!}	
					{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
					<div class="form-group errorLogin">
					    
			    		<h6 id="error_confirmation"></h6>
					    
			 		</div>
		    	</div>
	    	</div>
  
			<div class="form-row">
			    <div class="form-group col-md-12 {{ $errors->has('descripcion_admin') ? 'siError':'noError' }}">
			     	{!! Form::label('descripcion_admin', 'Descripcion', []) !!}
			     	{!! Form::textArea('descripcion_admin',null , ['class'=>'form-control','rows'=>4]) !!}
			    
				<div class="form-group errorLogin">
			    	<h6 id="error_desc">{{ $errors->has('descripcion_admin') ? $errors->first('descripcion_admin'):'' }}</h6>    
			 	</div>
			 </div>
	  		</div>
  		


		<br>
		<div class="form-row">
		<div class="form-group col-md-6">
			{!! Form::submit('Crear cuenta', ['class'=>'btn btn-primary btn-block','id'=>'buttonReg']) !!}
		</div>
		<div class="formgroup col-md-6">
			<a href="" class="btn btn-block btn-secondary">Cancelar</a>
		</div>
	</div>
		</div>
	</div>
		
	{!! Form::close() !!}
</div>
@endsection
@section('scripts')
  {!! Html::script('/js/vista_previa.js') !!}
  {!! Html::script('/js/validacion_ajax_request.js') !!}
  {!! Html::script('/js/validaciones.js') !!}

@endsection