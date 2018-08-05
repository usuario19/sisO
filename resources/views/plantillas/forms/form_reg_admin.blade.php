<div class="form-row">
			<div class="form-group col-md-6 {{ $errors->has('nombre') ? 'siError':'' }}">
				{!! Form::label('nombre', 'Nombre', []) !!}
		      	{!! Form::text('nombre', null , ['class' =>'form-control', 'placeholder'=>'Nombres']) !!}
			    <div class="form-row errorLogin">
				    
		    		<span><h6>{{ $errors->has('nombre') ? $errors->first('nombre'):'' }}</h6></span>
				    
		 		</div>
		    </div>

		    <div class="form-group col-md-6 {{ $errors->has('apellidos') ? 'siError':'' }}">
		    	{!! Form::label('apellidos', 'Apellidos', []) !!}
		    	{!! Form::text('apellidos', null, ['class' =>'form-control', 'placeholder'=>'Apellidos']) !!}
		    	<div class="form-row errorLogin">
				    
		    		<span><h6>{{ $errors->has('apellidos') ? $errors->first('apellidos'):'' }}</h6></span>
				    
		 		</div>
	    	</div>
	 	</div>

	 	<div class="form-row">
			<div class="form-group col-md-8">
				{!! Form::label('genero', 'Genero', []) !!}
			</div>
		</div>

	 	<div class="form-row {{ $errors->has('genero') ? 'siError':'' }}">

			<div class="form-group col-md-4">
				{!! Form::radio('genero', 1 ,null,['id'=>'generof','class'=>'radio']) !!}
				{!! Form::label('generof', 'Femenino', []) !!}
				
			</div>

			<div class="form-group col-md-4">
					
				{!! Form::radio('genero', 2 ,null,['id'=>'generom','class'=>'radio']) !!}
				{!! Form::label('generom', 'Masculino', []) !!}
				
			</div>
			<div class="form-row errorLogin">
				    
		    		<span><h6>{{ $errors->has('genero') ? $errors->first('genero'):'' }}</h6></span>
				    
		 	</div>
		</div>
   		<div class="form-row">
			<div class="form-group col-md-6 {{ $errors->has('fecha_nac') ? 'siError':'' }}">
	  			{!! Form::label('fecha_nac', 'Fecha de Nacimiento', []) !!}
	  			{!! Form::date('fecha_nac', \Illuminate\Support\Carbon::setTestNow(), ['class'=> 'form-control']) !!}
	  			<div class="form-row errorLogin">
				    
		    		<span><h6>{{ $errors->has('fecha_nac') ? $errors->first('fecha_nac'):'' }}</h6></span>
				    
		 	</div>
	  		</div>

	  		<div class="form-group col-md-6 {{ $errors->has('ci') ? 'siError':'' }}">
				{!! Form::label('ci', 'CI', []) !!}
				{!! Form::text('ci', null , ['class'=>'form-control', 'placeholder'=>'']) !!}
				<div class="form-row errorLogin">
				    
		    		<span><h6>{{ $errors->has('ci') ? $errors->first('ci'):'' }}</h6></span>
				    
		 	</div>
			</div>
  		</div>
		<div class="form-row">
	  		<div class="form-group col-md-12 {{ $errors->has('email') ? 'siError':'' }}">
	  			{!! Form::label('email', 'Correo electronico', []) !!}
	  			{!! Form::text('email', null , ['class' =>'form-control', 'placeholder'=>'example@example.com']) !!}
	    	</div>
	    	<div class="form-row errorLogin">
				    
		    		<span><h6>{{ $errors->has('email') ? $errors->first('email'):'' }}</h6></span>
				    
		 	</div>
    	</div>

    	<div class="form-row">
	  		<div class="form-group col-md-6 {{ $errors->has('password') ? 'siError':'' }}">
	    		{!! Form::label('password', 'Contraseña', []) !!}	
				{!! Form::password('password', ['class' => 'form-control']) !!}
				<div class="form-row errorLogin">
				    
		    		<span><h6>{{ $errors->has('password') ? $errors->first('password'):'' }}</h6></span>
				    
		 	</div>
	    	</div>

	    	<div class="form-group col-md-6">
	    		{!! Form::label('password_confirmation', 'Confirma tu contraseña', []) !!}	
				{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
				
	    	</div>
    	</div>
  
		<div class="form-row">
		    <div class="form-group col-md-12 {{ $errors->has('descripcion_admin') ? 'siError':'' }}">
		     	{!! Form::label('descripcion_admin', 'Descripcion', []) !!}
		     	{!! Form::textArea('descripcion_admin',null , ['class'=>'form-control','rows'=>4]) !!}
		    </div>
			<div class="form-row errorLogin">
				    
		    		<span><h6>{{ $errors->has('descripcion_admin') ? $errors->first('descripcion_admin'):'' }}</h6></span>
				    
		 	</div>
  		</div>
  		