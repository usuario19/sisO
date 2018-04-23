@extends('plantillas.menu_inicio')
@section('title')
	SisO: Crear Cuenta
@endsection
@section('content')
<div class="container col-md-8">
	<h1 class="display-4">Crear cuenta</h1>
	<br>
</div>
<div class="container col-md-6">
	
	{!! Form::open(['route'=>'usuario.store','method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true] ) !!}

		<div class="form-row">

			<div class="form-group col-md-6">
				{!! Form::label('nombre', 'Nombre', []) !!}
		      	{!! Form::text('nombre', null , ['class' =>'form-control', 'placeholder'=>'Nombres']) !!}
		    </div>

		    <div class="form-group col-md-6">
		    	{!! Form::label('apellidos', 'Apellidos', []) !!}
		    	{!! Form::text('apellidos', null, ['class' =>'form-control', 'placeholder'=>'Apellidos']) !!}
	    	</div>
	 	</div>

	 	<div class="form-row">
			<div class="form-group col-md-8">
				{!! Form::label('genero', 'Genero', []) !!}
			</div>
		</div>

	 	<div class="form-row">
			<div class="form-group col-md-4">
				{!! Form::radio('genero', ' Femenino', false, []) !!}
				{!! Form::label('genero', 'Femenino', []) !!}
			</div>

			<div class="form-group col-md-4">	
				{!! Form::radio('genero', ' Masculino', false, []) !!}
				{!! Form::label('genero', 'Masculino', []) !!}
			</div>	
		</div>

	 	

   		<div class="form-row">

	  		<div class="form-group col-md-6">
				{!! Form::label('ci', 'CI', []) !!}
				{!! Form::text('ci', null , ['class'=>'form-control', 'placeholder'=>'']) !!}
			</div>
			<div class="form-group col-md-6">
				{!! Form::label('ci_ciudad', 'Expedido', []) !!}
				{!! Form::select('ci_ciudad', ['Cochabamba'=> 'Cochabamba','La Paz'=>'La Paz', 'Santa Cruz'=>'Santa Cruz','Potosi'=>'Potosi','Oruro'=>'Oruro','Tarija'=>'Tarija','Chuquisaca'=>'Chuquisaca','Beni'=>'Beni','Pando'=>'Pando'], null , ['class'=>'form-control']) !!}
		    </div>
  		</div>

  		<div class="form-row">
  			
	  		<div class="form-group col-md-6">
	  			{!! Form::label('fecha_nac', 'Fecha de Nacimiento', []) !!}
	  			{!! Form::date('fecha_nac', \Illuminate\Support\Carbon::now(), ['class'=> 'form-control']) !!}
	  		</div>
		</div>
		<div class="form-row">
	  		<div class="form-group col-md-12">
	  			{!! Form::label('email', 'Correo electronico', []) !!}
	  			{!! Form::text('email', null , ['class' =>'form-control', 'placeholder'=>'example@example.com']) !!}
	    	</div>
    	</div>

    	<div class="form-row">
	  		<div class="form-group col-md-6">
	    		{!! Form::label('password', 'Contraseña', []) !!}	
				{!! Form::password('password', ['class' => 'form-control']) !!}
	    	</div>

	    	<div class="form-group col-md-6">
	    		{!! Form::label('password_confirmed', 'Confirma tu contraseña', []) !!}	
				{!! Form::password('password', ['class' => 'form-control']) !!}
	    	</div>
    	</div>
  
		<div class="form-row">
		    <div class="form-group col-md-12">
		     	{!! Form::label('descripcion_usuario', 'Descripcion', []) !!}
		     	{!! Form::textArea('descripcion_usuario',null , ['class'=>'form-control','rows'=>4]) !!}
		    </div>

  		</div>
  		<div class="form-row">
  			
  		</div>
  		
		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::label('foto', 'Subir foto', []) !!}
				{!! Form::file('foto', ['class'=>'form-control']) !!}
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::label('id_club', 'Club', []) !!}
				{!! Form::text('id_club', null, ['class'=>'form-control']) !!}
			</div>
		</div>
		
		<br>
		
		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::submit('Crear cuenta', ['class'=>'btn btn-primary']) !!}

			</div>
		</div>
	{!! Form::close() !!}
</div>
@endsection