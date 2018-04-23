@extends('plantillas.menu_inicio')
@section('title')
SisO:Crear Gestion
@endsection
@section('content')
<div class="container col-md-8">
	<h1 class="display-4">Crear Gestion</h1>
	<br>
</div>
<div class="container col-md-6">
	{!! Form::open(['route'=>'gestion.store','metod'=>'POST','enctype'=>'multipart/formdata','file'=>true]) !!}	
	<div class="form-row">
		<div class="form-group col-md-12">
			{!! Form::label('nombre', 'Nombre', []) !!}
			{!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
		</div>
	</div>
	
	<div class="form-row">
		<div class="form-group col-md-12">
			{!! Form::label('descripcion', 'Descripcion', []) !!}
			{!! Form::textarea('descripcion', null, ['class'=>'form-control','placeholder'=>'Descripcion', 'rows'=> 4]) !!}
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6">
			{!! Form::label('fechaIni', 'Fecha de inicio', []) !!}
			{!! Form::date('fechaIni', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
		</div>
		<div class="form-group col-md-6">
			{!! Form::label('fechaFin', 'Fecha de Fin', []) !!}
			{!! Form::date('fechaFin', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
		</div>
	</div>
	
	<div class="form-row">
		<div class="form-group col-md-6">
			{!! Form::label('disciplina', 'Disciplinas', []) !!}
			<br>
			<div class="card">
				<div class="card-body">
					@foreach ($disciplina as $valor)

						{!! Form::checkbox('id_disciplinas[]',$valor->id_disc, false, []) !!}
						{!! Form::label('disciplina',$valor->nombre_disc, []) !!}
						<br>
					@endforeach
				</div>
				
			</div>
				

					
		</div>
	</div>
	
	<div class="form-row">
		<div class="form-group col-md-6">
			{!! Form::submit('Crear Gestion', ['class'=>'btn btn-primary']) !!}
		</div>
	</div>

</div>
@endsection