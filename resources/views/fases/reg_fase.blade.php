@extends('plantillas.main')
@section('title')
SisO:Crear Gestion
@endsection
@section('content')
<div class="container col-md-8">
	<h1 class="display-4">Crear Fase</h1>
	<br>
</div>
<div class="container col-md-6">
	{!! Form::open(['route'=>'fase.store','metod'=>'POST','enctype'=>'multipart/formdata','file'=>true]) !!}	
	<div class="form-row">
		<div class="form-group col-md-12">
			{!! Form::label('nombre', 'Nombre', []) !!}
			{!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			{!! Form::label('tipo', 'Tipos', []) !!}
			<br>
			<div class="card">
				<div class="card-body">
					<div class="form-row">
				 		<div class="form-group col-md-4">
							{!! Form::radio('tipo', 1 ,null,['id'=>'series','class'=>'radio']) !!}
							{!! Form::label('series', 'Series', []) !!}
							
						</div>

						<div class="form-group col-md-4">
								
							{!! Form::radio('tipo', 0 ,null,['id'=>'eliminacion','class'=>'radio']) !!}
							{!! Form::label('eliminacion', 'Eliminacion', []) !!}
							
						</div>
					</div>	
							</div>
			</div>
				
		</div>
	</div>
	
	<div class="form-row">
		<div class="form-group col-md-6">
			{!! Form::submit('Crear Fase', ['class'=>'btn btn-primary']) !!}
		</div>
	</div>

</div>
@endsection