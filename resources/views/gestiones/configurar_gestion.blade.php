@extends('plantillas.main')
@section('title')
SisO:Configurar gestion
@endsection
@section('submenu')

@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="container col-md-6">
	{!! Form::open(['route'=>['gestion.update',$gestion->id_gestion],'metod'=>'POST','enctype'=>'multipart/formdata']) !!}	
		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::label('nombre','Nombre', []) !!}
				{!! Form::text('nombre',$gestion->nombre_gestion, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::label('descripcion', 'Descripcion', []) !!}
				{!! Form::textarea('descripcion', $gestion->desc_gest, ['class'=>'form-control','placeholder'=>'Descripcion', 'rows'=> 4]) !!}
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				{!! Form::label('fechaIni', 'Fecha de inicio', []) !!}
				{!! Form::date('fecha_ini', $gestion->fecha_ini, ['class'=>'form-control']) !!}

			</div>
			<div class="form-group col-md-6">
				{!! Form::label('fechaFin', 'Fecha de Fin', []) !!}
				{!! Form::date('fecha_fin', $gestion->fecha_fin, ['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<button class="btn btn-secondary">Cancelar</button>
				{!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}

			</div>
		</div>
	{!! Form::close() !!}
</div>
@endsection