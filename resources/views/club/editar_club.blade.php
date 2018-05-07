@extends('plantillas.main')
@section('title')
SisO: Editar Clubs
@endsection
@section('content')
<div class="container col-md-8">
	<h1 class="display-4">Editar Club</h1>
	<br>
</div>
<div class="container col-md-6">
	
	{!! Form::model($club, ['route'=>['club.update',$club->id_club],'method'=>'PUT','enctype'=>'multipart/form-data','file'=>true]) !!}

		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::label('nombre_club', 'Nombre del Club', []) !!}
				{!! Form::text('nombre_club',$club->nombre_club,['class'=>'form-control'])!!}

			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::label('id_administrador', 'Coordinador', []) !!}
				{!! Form::select('id_administrador', $administradores,null, ['class'=>'form-control']) !!}
				
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
				{!! Form::textarea('descripcion_club', $club->descripcion_club, ['class'=>'form-control','rows'=>4]) !!}
			</div>
		</div>
		<br>
		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}

			</div>
		</div>

	{!! Form::close() !!}
</div>
@endsection