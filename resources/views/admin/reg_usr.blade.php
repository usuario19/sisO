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
						<img class="rounded mx-auto d-block float-left" src="/storage/fotos/usuario-sin-foto.png" alt="" height="200px" width="200px" >
					</div>

				</div>
				<div class="form-row">
					<div class="form-group uploader">
						<p class="texto">Subir Foto</p>
						{!! Form::file('foto_admin', ['class'=>'upload']) !!}
					</div>
				</div>
			</div>
			
			<div class="form-group col-md-8" >
				@include('plantillas.forms.form_reg_admin')
				<div class="form-row">
				<div class="form-group col-md-12">
					{!! Form::submit('Crear cuenta', ['class'=>'btn btn-primary']) !!}
				</div>
			</div>
		</div>
	</div>
		
	{!! Form::close() !!}
</div>
@endsection