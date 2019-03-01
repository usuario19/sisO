@extends('plantillas.main')
@section('title')
SisO:Configurar gestion
@endsection
@section('submenu')

@include('plantillas.menus.menu_gestion')
@endsection

@section('content')

<div class="container col-md-6">
	{!! Form::open(['route'=>['gestion.update'],'metod'=>'POST','enctype'=>'multipart/formdata']) !!}	
		<div style="display:none">
			<div class="form-group col-md-12">
				{!! Form::text('id_gestion',$gestion->id_gestion, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::label('nombre','Nombre', []) !!}
				{!! Form::text('nombre_gestion',$gestion->nombre_gestion, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
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
				<div class="form-group col-md-12">
					{!! Form::label('sede','Sede', []) !!}
					{!! Form::text('sede',$gestion->sede, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
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
							<div class="form-group col-md-12">
						{!! Form::label('activo', 'Estado de Gestion', []) !!}
					</div>
					@if ($gestion->estado_gestion == 1)
						<div class="form-group col-md-6">
								{!! Form::label('activo', 'Activa', []) !!}			
								{!! Form::radio('estado_gestion',1,true,['class'=>'form-check form-check-inline']) !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::label('activo', 'Desactivada', []) !!}
							{!! Form::radio('estado_gestion',0,false,['class'=>'form-check form-check-inline']) !!}
							
						</div>
					@else
						<div class="form-group col-md-6">
								{!! Form::label('activo', 'Activa', []) !!}			
								{!! Form::radio('estado_gestion',1,false,['class'=>'form-check form-check-inline']) !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::label('activo', 'Desactivada', []) !!}
							{!! Form::radio('estado_gestion',0,true,['class'=>'form-check form-check-inline']) !!}
							
						</div>
					@endif
				</div>
				<div class="form-group col-md-6">
						<div class="form-group col-md-12">
					{!! Form::label('activo', 'Periodo de Inscripcion', []) !!}
				</div>
					@if ($gestion->periodo_inscripcion == 1)
						<div class="form-group col-md-6">
								{!! Form::label('activo', 'Activa', []) !!}			
								{!! Form::radio('periodo_inscripcion', 1, true,['class'=>'form-check form-check-inline']) !!}
						</div>
						<div class="form-group col-md-6">
						{!! Form::label('activo', 'Desactivada', []) !!}
						{!! Form::radio('periodo_inscripcion', 0, false,['class'=>'form-check form-check-inline']) !!}
					</div>
					@else
						<div class="form-group col-md-6">
								{!! Form::label('activo', 'Activa', []) !!}			
								{!! Form::radio('periodo_inscripcion', 1, false,['class'=>'form-check form-check-inline']) !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::label('activo', 'Desactivada', []) !!}
							{!! Form::radio('periodo_inscripcion', 0, true,['class'=>'form-check form-check-inline']) !!}
						</div>
					@endif	
			</div>
			</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<button class="btn btn-secondary">Cancelar</button>
				{!! Form::submit('Aceptar', ['class'=>'btn btn-primary']) !!}

</div>
</div>
</div>

@endsection