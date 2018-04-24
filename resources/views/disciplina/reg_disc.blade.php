@extends('plantillas.main')
@section('title')
SisO:Crear Disciplina
@endsection
@section('content')
<div class="container col-md-8">
	<h1 class="display-4">Registrar Disciplina</h1>
	<br>
</div>
<div class="container col-md-6">
	{!! Form::open(['route'=>'disciplina.store','method'=>'POST','enctype'=>'multipart/form-data','files'=>true]) !!}
	
	<div class="form-row">
		<div class="form-group col-md-12">
			{!! Form::label('nombre_disc', 'Nombre Disciplina', []) !!}
			{!! Form::text('nombre_disc', null, ['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-12">
			{!! Form::label('foto_disc', 'Imagen', []) !!}
			{!! Form::file('foto_disc', ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-12">
			{!! Form::label('reglamento_disc', 'Subir reglamento', []) !!}
			{!! Form::file('reglamento_disc', ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-12">

			{!! Form::label('descripcion_disc', 'Descripcion Disciplina', []) !!}
			{!! Form::textArea('descripcion_disc', null, ['class'=>'form-control' ,'rows'=>4]) !!}
		</div>
	</div>
	<br>
	<div class="form-row">
		<div class="form-group col-md-12">

			{!! Form::submit('Registrar Disciplina', ['class'=>'btn btn-primary']) !!}
		</div>
	</div>
		
	{!! Form::close() !!}
</div>
@endsection
