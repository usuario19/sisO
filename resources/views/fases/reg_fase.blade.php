@extends('plantillas.main')
@section('title')
SisO:Crear Fase
@endsection
@section('content')
<div class="container col-md-8">
	<h1 class="display-4">Crear Fase</h1>
	<br>
</div>
<div class="container col-md-6">
	{!! Form::open(['route'=>'fase.store','metod'=>'POST','enctype'=>'multipart/formdata']) !!}	
	<div class="form-row">
		<div class="form-group col-md-12">
			{!! Form::label('nombre', 'Nombre', []) !!}
			{!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-12">
			{!! Form::label('tipo', 'Tipos', []) !!}
			<br>
			<div class="card">
				<div class="card-body">
					<div class="form-row">
				 			@foreach ($tipos as $tipo)
				 			<div class="form-group col-md-4">
				 				{!! Form::radio('tipo',$tipo->id_tipo,null,['id'=>'series','class'=>'radio']) !!}
								{!! Form::label('series',$tipo->nombre_tipo, []) !!}
								</div>
				 			@endforeach				
					</div>	
				</div>
			</div>
				
		</div>
	</div>
	<div style="display: none;">
		{!! Form::text('id_disc', $id_disc, []) !!}
		{!! Form::text('id_gestion', $id_gestion, []) !!}
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			{!! Form::submit('Crear Fase', ['class'=>'btn btn-primary']) !!}
		</div>
	</div>
{!! Form::close() !!}
</div>
@endsection