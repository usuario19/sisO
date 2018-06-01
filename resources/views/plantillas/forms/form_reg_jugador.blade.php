		

			<tr>
				<th><h6 class="display-6 ">{!! Form::label('nombre_jugador', 'Nombre:', []) !!}</h6></th>
		      	<td colspan="2">{!! Form::text('nombre_jugador', null , ['class' =>'form-control', 'placeholder'=>'Nombres']) !!}</td>
			</tr>

		    
	    	<tr>
	    		<th><h6 class="display-6 ">{!! Form::label('apellidos_jugador', 'Apellidos:', []) !!}</h6></th>
	    		<td colspan="2">{!! Form::text('apellidos_jugador', null, ['class' =>'form-control', 'placeholder'=>'Apellidos']) !!}</td>
	    	</tr>
    	
			<tr>
				<th><h6 class="display-6 ">{!! Form::label('genero_jugador', 'Genero:', []) !!}</h6></th>
							
				<td>{!! Form::radio('genero_jugador', 1 ,null,['id'=>'generof','class'=>'radio']) !!}
					{!! Form::label('generof', 'Femenino', []) !!}</td>
			
				<td>{!! Form::radio('genero_jugador', 2 ,null,['id'=>'generom','class'=>'radio']) !!}
					{!! Form::label('generom', 'Masculino', []) !!}</td>
			</tr>
				

			<tr>
				<th><h6 class="display-6 ">{!! Form::label('ci_jugador', 'Carnet de Identidad:', []) !!}</h6></th>
				<td colspan="2">{!! Form::text('ci_jugador', null , ['class'=>'form-control', 'placeholder'=>'']) !!}</td>
			</tr>

  			<tr>
  				<th><h6 class="display-6 ">{!! Form::label('fecha_nac_jugador', 'Fecha de Nacimiento:', []) !!}</h6></th>
  				<td colspan="2">{!! Form::date('fecha_nac_jugador', \Illuminate\Support\Carbon::setTestNow(), ['class'=> 'form-control']) !!}</td>
  			</tr>
	  		
  			<tr>
  				<th><h6 class="display-6 ">{!! Form::label('email_jugador', 'Email:', []) !!}</h6></th>
  				<td colspan="2">{!! Form::text('email_jugador', null , ['class' =>'form-control', 'placeholder'=>'example@example.com']) !!}</td>
  			</tr>
	    	
	     	<tr>
	     		<th><h6 class="display-6 ">{!! Form::label('descripcion_jugador', 'Descripcion:', []) !!}</h6></th>
	     		<td colspan="2">{!! Form::textArea('descripcion_jugador',null , ['class'=>'form-control','rows'=>3]) !!}</td>
	     	</tr>
  		
		