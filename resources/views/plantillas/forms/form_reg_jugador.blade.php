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
				{!! Form::radio('genero_jugador', 1 ,null,['id'=>'generof','class'=>'radio']) !!}
				{!! Form::label('generof', 'Femenino', []) !!}
				
			</div>

			<div class="form-group col-md-4">
					
				{!! Form::radio('genero_jugador', 0 ,null,['id'=>'generom','class'=>'radio']) !!}
				{!! Form::label('generom', 'Masculino', []) !!}
				
			</div>
		</div>

	 	

   		<div class="form-row">

	  		<div class="form-group col-md-6">
				{!! Form::label('ci_jugador', 'CI', []) !!}
				{!! Form::text('ci_jugador', null , ['class'=>'form-control', 'placeholder'=>'']) !!}
			</div>
			<div class="form-group col-md-6">
	  			{!! Form::label('fecha_nac_jugador', 'Fecha de Nacimiento', []) !!}
	  			{!! Form::date('fecha_nac_jugador', \Illuminate\Support\Carbon::setTestNow(), ['class'=> 'form-control']) !!}
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
  		
		