@extends('plantillas.main')
@section('title')
SisO:Crear Grupos

@endsection
@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="container col-md-8">
	<h1 class="display-4">Crear Grupos</h1>
	<br>
</div>
<div class="container col-md-8">
	{!! Form::open(['route'=>'grupo.store','metod'=>'POST','enctype'=>'multipart/formdata']) !!}	

	<div style="display: none">
		{!! Form::text('id_fase', $id_fase, []) !!}
		
	</div>
	@for ($i = 0; $i < $cantGrupos; $i++)
	<div class="card">
						<div class="card-body">
			<div class="form-row">
				<div class="form-group col-md-6">
					
							{!! Form::label('nombre', 'Nombre', []) !!}
							{!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
					
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				{!! Form::label('clubs', 'Clubs', []) !!}
				@foreach ($clubs as $club)
					
				@endforeach
			</div>
		</div>
			</div>
				</div>
		<br>
	@endfor
	<div class="form-row">
		<div class="form-group col-md-6">
			{!! Form::submit('Crear Grupos', ['class'=>'btn btn-primary']) !!}
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection