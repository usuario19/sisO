@extends('plantillas.main')
@section('title')
	SisO: Registrar jugador
@endsection
@section('content')
<div class="container col-md-8">
	<h1 class="display-4">Registrar Jugadores</h1>
	<br>
</div>
<div class="container col-md-6">
	
	{!! Form::open(['route'=>'jugador.store','method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true] ) !!}

		<div class="form-row">

			<div class="form-group col-md-6">
				{!! Form::label('nombre_jugador', 'Nombre', []) !!}
		      	{!! Form::text('nombre_jugador', null , ['class' =>'form-control', 'placeholder'=>'Nombres']) !!}
		    </div>

		    <div class="form-group col-md-6">
		    	{!! Form::label('apellidos_jugador', 'Apellidos', []) !!}
		    	{!! Form::text('apellidos_jugador', null, ['class' =>'form-control', 'placeholder'=>'Apellidos']) !!}
	    	</div>
	 	</div>

	 	<div class="form-row">
			<div class="form-group col-md-8">
				{!! Form::label('genero_jugador', 'Genero', []) !!}
			</div>
		</div>

	 	<div class="form-row">
			<div class="form-group col-md-4">
				{!! Form::radio('genero_jugador', ' Femenino', false, []) !!}
				{!! Form::label('genero_jugador', 'Femenino', []) !!}
			</div>

			<div class="form-group col-md-4">	
				{!! Form::radio('genero_jugador', ' Masculino', false, []) !!}
				{!! Form::label('genero_jugador', 'Masculino', []) !!}
			</div>	
		</div>

	 	

   		<div class="form-row">

	  		<div class="form-group col-md-6">
				{!! Form::label('ci_jugador', 'CI', []) !!}
				{!! Form::text('ci_jugador', null , ['class'=>'form-control', 'placeholder'=>'']) !!}
			</div>
			<div class="form-group col-md-6">
				{!! Form::label('ci_ciudad', 'Expedido', []) !!}
				{!! Form::select('ci_ciudad', ['Cochabamba'=> 'Cochabamba','La Paz'=>'La Paz', 'Santa Cruz'=>'Santa Cruz','Potosi'=>'Potosi','Oruro'=>'Oruro','Tarija'=>'Tarija','Chuquisaca'=>'Chuquisaca','Beni'=>'Beni','Pando'=>'Pando'], null , ['class'=>'form-control']) !!}
		    </div>
  		</div>

  		<div class="form-row">
  			
	  		<div class="form-group col-md-6">
	  			{!! Form::label('fecha_nac_jugador', 'Fecha de Nacimiento', []) !!}
	  			{!! Form::date('fecha_nac_jugador', \Illuminate\Support\Carbon::now(), ['class'=> 'form-control']) !!}
	  		</div>
		</div>
		<div class="form-row">
	  		<div class="form-group col-md-12">
	  			{!! Form::label('email_jugador', 'Correo electronico', []) !!}
	  			{!! Form::text('email_jugador', null , ['class' =>'form-control', 'placeholder'=>'example@example.com']) !!}
	    	</div>
    	</div>

  
		<div class="form-row">
		    <div class="form-group col-md-12">
		     	{!! Form::label('descripcion_jugador', 'Descripcion', []) !!}
		     	{!! Form::textArea('descripcion_jugador',null , ['class'=>'form-control','rows'=>4]) !!}
		    </div>

  		</div>
  		<div class="form-row">
  			
  		</div>
  		
		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::label('foto_jugador', 'Subir foto', []) !!}
				{!! Form::file('foto_jugador', ['class'=>'form-control']) !!}
			</div>
		</div>
		
		<br>
		
		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::submit('Registrar Jugador', ['class'=>'btn btn-primary']) !!}

			</div>
		</div>
	{!! Form::close() !!}
</div>
@endsection