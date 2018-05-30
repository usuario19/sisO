		

			<tr>
				<th scope="row">{!! Form::label('nombre_jugador', 'Nombre:', []) !!}</th>
		      	<td colspan="2">{!! Form::text('nombre_jugador', null , ['class' =>'form-control', 'placeholder'=>'Nombres']) !!}</td>
			</tr>

		    
	    	<tr>
	    		<th scope="row">{!! Form::label('apellidos_jugador', 'Apellidos:', []) !!}</th>
	    		<td colspan="2">{!! Form::text('apellidos_jugador', null, ['class' =>'form-control', 'placeholder'=>'Apellidos']) !!}</td>
	    	</tr>
    	
			<tr>
				<th scope="row">{!! Form::label('genero_jugador', 'Genero:', []) !!}</th>
							
				<td>{!! Form::radio('genero_jugador', 1 ,null,['id'=>'generof','class'=>'radio']) !!}
					{!! Form::label('generof', 'Femenino', []) !!}</td>
			
				<td>{!! Form::radio('genero_jugador', 2 ,null,['id'=>'generom','class'=>'radio']) !!}
					{!! Form::label('generom', 'Masculino', []) !!}</td>
			</tr>
				

			<tr>
				<th scope="row">{!! Form::label('ci_jugador', 'CI:', []) !!}</th>
				<td colspan="2">{!! Form::text('ci_jugador', null , ['class'=>'form-control', 'placeholder'=>'']) !!}</td>
			</tr>

  			<tr>
  				<th scope="row">{!! Form::label('fecha_nac_jugador', 'Fecha de Nacimiento:', []) !!}</th>
  				<td colspan="2">{!! Form::date('fecha_nac_jugador', \Illuminate\Support\Carbon::setTestNow(), ['class'=> 'form-control']) !!}</td>
  			</tr>
	  		
  			<tr>
  				<th scope="row">{!! Form::label('email_jugador', 'Email:', []) !!}</th>
  				<td colspan="2">{!! Form::text('email_jugador', null , ['class' =>'form-control', 'placeholder'=>'example@example.com']) !!}</td>
  			</tr>
	    	
	     	<tr>
	     		<th scope="row">{!! Form::label('descripcion_jugador', 'Descripcion:', []) !!}</th>
	     		<td colspan="2">{!! Form::textArea('descripcion_jugador',null , ['class'=>'form-control','rows'=>3]) !!}</td>
	     	</tr>
  		
		