@extends('plantillas.menu_inicio')
@section('title')
SisO: Crear Clubs
@endsection
@section('content')
<div class="container col-md-8">
	<h1 class="display-4">Registrar Club</h1>
	<br>
</div>
<div class="container col-md-6">
	{!! Form::open(['route'=>'club.store','method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true] ) !!}

		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::label('nombre_club', 'Nombre del Club', []) !!}
				{!! Form::text('nombre_club', null, ['class'=>'form-control']) !!}
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::label('id_coordinador', 'Coordinador', []) !!}
				{!! Form::select('id_coordinador', $usuarios,null, ['class'=>'form-control']) !!}
				
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::label('ciudad', 'Ciudad', []) !!}
				{!! Form::select('ciudad', ['Cochabamba'=> 'Cochabamba','La Paz'=>'La Paz', 'Santa Cruz'=>'Santa Cruz','Potosi'=>'Potosi','Oruro'=>'Oruro','Tarija'=>'Tarija','Chuquisaca'=>'Chuquisaca','Beni'=>'Beni','Pando'=>'Pando'], null , ['class'=>'form-control']) !!}
		    </div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::label('logo', 'Logo', []) !!}
				{!! Form::file('logo', ['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::label('descripcion_club', 'Descripcion', []) !!}
				{!! Form::textarea('descripcion_club', null, ['class'=>'form-control','rows'=>4]) !!}
			</div>
		</div>
		<br>
		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::submit('Registrar Club', ['class'=>'btn btn-primary']) !!}

			</div>
		</div>

	{!! Form::close() !!}
</div>
@endsection