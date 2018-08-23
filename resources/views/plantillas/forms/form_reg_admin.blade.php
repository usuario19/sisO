<div class="form-row">
			<div class="form-group col-md-6 {{ $errors->has('nombre') ? 'siError':'noError' }}">
				{!! Form::label('nombre', 'Nombre', []) !!}
		      	{!! Form::text('nombre', null , ['class' =>'form-control', 'placeholder'=>'Nombres']) !!}
			    <div class="form-group errorLogin">
				    
		    		<h6 id="error_nombre">{{ $errors->has('nombre') ? $errors->first('nombre'):'' }}</h6>
				    
		 		</div>
		    </div>

		    <div class="form-group col-md-6 {{ $errors->has('apellidos') ? 'siError':'noError' }}">
		    	{!! Form::label('apellidos', 'Apellidos', []) !!}
		    	{!! Form::text('apellidos', null, ['class' =>'form-control', 'placeholder'=>'Apellidos']) !!}
		    	<div class="form-group errorLogin">
				    
		    		<h6 id="error_apellidos">{{ $errors->has('apellidos') ? $errors->first('apellidos'):'' }}</h6>
				    
		 		</div>
	    	</div>
	 	</div>

	 	<div class="form-row">
			<div class="form-group col-md-8">
				{!! Form::label('genero', 'Genero', []) !!}
			</div>
		</div>

	 	<div class="form-row {{ $errors->has('genero') ? 'siError':'noError' }}">

			<div class="form-group col-md-4">
				{!! Form::radio('genero', 1 ,null,['id'=>'generof','class'=>'radio']) !!}
				{!! Form::label('generof', 'Femenino', []) !!}
				
			</div>

			<div class="form-group col-md-4">
					
				{!! Form::radio('genero', 2 ,null,['id'=>'generom','class'=>'radio']) !!}
				{!! Form::label('generom', 'Masculino', []) !!}
				
			</div>
			<div class="form-group errorLogin">
		    		<h6>{{ $errors->has('genero') ? $errors->first('genero'):'' }}</h6>
		 	</div>
		</div>
   		<div class="form-row">
			<div class="form-group col-md-6 {{ $errors->has('fecha_nac') ? 'siError':'noError' }}">
	  			{!! Form::label('fecha_nac', 'Fecha de Nacimiento', []) !!}
	  			{!! Form::date('fecha_nac', \Illuminate\Support\Carbon::setTestNow(), ['class'=> 'form-control']) !!}
	  			<div class="form-group errorLogin">
				    
		    		<h6 id="error_fecha">{{ $errors->has('fecha_nac') ? $errors->first('fecha_nac'):'' }}</h6>
				    
		 	</div>
	  		</div>

	  		<div class="form-group col-md-6 {{ $errors->has('ci') ? 'siError':'noError' }}">
				{!! Form::label('ci', 'CI', []) !!}
				{!! Form::text('ci', null , ['class'=>'form-control', 'placeholder'=>'']) !!}
				<div class="form-group errorLogin">
				    
		    		<h6 id="error_ci">{{ $errors->has('ci') ? $errors->first('ci'):'' }}</h6>
				    
		 	</div>
			</div>
  		</div>
		<div class="form-row">
	  		<div class="form-group col-md-12 {{ $errors->has('email') ? 'siError':'noError' }}">
	  			{!! Form::label('email', 'Correo electronico', []) !!}
	  			{!! Form::text('email', null , ['class' =>'form-control', 'placeholder'=>'example@example.com']) !!}

	  			<div class="form-group errorLogin">
				    
		    		<h6 id="error_email">{{ $errors->has('email') ? $errors->first('email'):'' }}</h6>
				    
		 	</div>
	    	</div>
	    	
    	</div>

    	<div class="form-row">
	  		<div class="form-group col-md-6 {{ $errors->has('password') ? 'siError':'noError' }}">
	    		{!! Form::label('password', 'Contraseña', []) !!}	
				{!! Form::password('password', ['class' => 'form-control']) !!}
				<div class="form-group errorLogin">
				    
		    		<h6 id="error_password">{{ $errors->has('password') ? $errors->first('password'):'' }}</h6>
				    
		 		</div>
	    	</div>

	    	<div class="form-group col-md-6">
	    		{!! Form::label('password_confirmation', 'Confirma tu contraseña', []) !!}	
				{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
				<div class="form-group errorLogin">
				    
		    		<h6 id="error_confirmation"></h6>
				    
		 	</div>
	    	</div>
    	</div>
  
		<div class="form-row">
		    <div class="form-group col-md-12 {{ $errors->has('descripcion_admin') ? 'siError':'noError' }}">
		     	{!! Form::label('descripcion_admin', 'Descripcion', []) !!}
		     	{!! Form::textArea('descripcion_admin',null , ['class'=>'form-control','rows'=>4]) !!}
		    
			<div class="form-group errorLogin">
		    	<h6 id="error_desc">{{ $errors->has('descripcion_admin') ? $errors->first('descripcion_admin'):'' }}</h6>    
		 	</div>
		 </div>
  		</div>
  		