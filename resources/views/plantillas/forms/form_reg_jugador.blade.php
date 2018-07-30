		

			
				{!! Form::label('nombre_jugador', 'Nombre:', []) !!}
		      	{!! Form::text('nombre_jugador', null , ['class' =>'form-control', 'placeholder'=>'Nombres']) !!}
			

		    
	    	
	    		{!! Form::label('apellidos_jugador', 'Apellidos:', []) !!}
	    		{!! Form::text('apellidos_jugador', null, ['class' =>'form-control', 'placeholder'=>'Apellidos']) !!}
	    	
    	
			
				{!! Form::label('genero_jugador', 'Genero:', []) !!}
							
				{!! Form::radio('genero_jugador', 1 ,null,['id'=>'generof','class'=>'radio']) !!}
					{!! Form::label('generof', 'Femenino', []) !!}
			
				{!! Form::radio('genero_jugador', 2 ,null,['id'=>'generom','class'=>'radio']) !!}
					{!! Form::label('generom', 'Masculino', []) !!}
			
				

			
				{!! Form::label('ci_jugador', 'Carnet de Identidad:', []) !!}
				{!! Form::text('ci_jugador', null , ['class'=>'form-control', 'placeholder'=>'']) !!}
			

  			
  				{!! Form::label('fecha_nac_jugador', 'Fecha de Nacimiento:', []) !!}
  				{!! Form::date('fecha_nac_jugador', \Illuminate\Support\Carbon::setTestNow(), ['class'=> 'form-control']) !!}
  			
	  		
  			
  				{!! Form::label('email_jugador', 'Email:', []) !!}
  				{!! Form::text('email_jugador', null , ['class' =>'form-control', 'placeholder'=>'example@example.com']) !!}
  			
	    	
	     	
	     		{!! Form::label('descripcion_jugador', 'Descripcion:', []) !!}
	     		{!! Form::textArea('descripcion_jugador',null , ['class'=>'form-control','rows'=>3]) !!}
	     	
  		
		