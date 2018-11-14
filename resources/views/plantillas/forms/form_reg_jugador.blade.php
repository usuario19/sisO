<div class="form-row">
<div class="form-group col-md-6 {{ $errors->has('nombre') ? 'siError':'noError' }}">		
	{!! Form::label('nombre_jugador', 'Nombre:', []) !!}
	{!! Form::text('nombre_jugador', null , ['class' =>'form-control', 'placeholder'=>'Nombres']) !!}
	<div class="form-group errorLogin">
			
			<h6 id="error_nombre">{{ $errors->has('nombre') ? $errors->first('nombre'):'' }}</h6>
			
		</div>
	</div>

	<div class="form-group col-md-6 {{ $errors->has('apellidos') ? 'siError':'noError' }}">
		{!! Form::label('apellidos_jugador', 'Apellidos:', []) !!}
		{!! Form::text('apellidos_jugador', null, ['class' =>'form-control', 'placeholder'=>'Apellidos']) !!}
		<div class="form-group errorLogin">
			
			<h6 id="error_apellidos">{{ $errors->has('apellidos') ? $errors->first('apellidos'):'' }}</h6>
				
		</div>
	</div>
</div>
    	
<div class="form-row">
	<div class="form-group col-md-8">	
			
		{!! Form::label('genero_jugador', 'Genero:', []) !!}
	</div>
</div>	
<div class="form-row {{ $errors->has('genero') ? 'siError':'noError' }}">

			
	<div class="form-group col-md-4">					
		{!! Form::radio('genero_jugador', 1 ,1,['id'=>'generof','class'=>'radio']) !!}
			{!! Form::label('generof', 'Femenino', []) !!}
		</div>
		
		<div class="form-group col-md-4">	
		{!! Form::radio('genero_jugador', 2 ,2,['id'=>'generom','class'=>'radio']) !!}
			{!! Form::label('generom', 'Masculino', []) !!}
		</div>
		<div class="form-group errorLogin">
							<h6 id="error_genero">{{ $errors->has('genero') ? $errors->first('genero'):'' }}</h6>
					 </div>
	
</div>
<div class="form-row">
	<div class="form-group col-md-6 {{ $errors->has('fecha_nac') ? 'siError':'noError' }}">
		
		{!! Form::label('fecha_nac_jugador', 'Fecha de Nacimiento:', []) !!}
		{!! Form::date('fecha_nac_jugador', \Illuminate\Support\Carbon::setTestNow(), ['class'=> 'form-control']) !!}
	
		<div class="form-group errorLogin">
				
				<h6 id="error_fecha">{{ $errors->has('fecha_nac') ? $errors->first('fecha_nac'):'' }}</h6>
				
		</div>
	</div>

	<div class="form-group col-md-6 {{ $errors->has('ci') ? 'siError':'noError' }}">
						
		{!! Form::label('ci_jugador', 'Carnet de Identidad:', []) !!}
		{!! Form::text('ci_jugador', null , ['class'=>'form-control', 'placeholder'=>'']) !!}
	
		<div class="form-group errorLogin">
			
				<h6 id="error_ci">{{ $errors->has('ci') ? $errors->first('ci'):'' }}</h6>
				
		</div>
	</div>
</div>
<div class="form-row">
		<div class="form-group col-md-12 {{ $errors->has('email') ? 'siError':'noError' }}">
		{!! Form::label('email_jugador', 'Email:', []) !!}
		{!! Form::text('email_jugador', null , ['class' =>'form-control', 'placeholder'=>'example@example.com']) !!}
	
			<div class="form-group errorLogin">
			
				<h6 id="error_email">{{ $errors->has('email') ? $errors->first('email'):'' }}</h6>
				
			</div>
		</div>
		
</div>
<div class="form-row">
	<div class="form-group col-md-12 {{ $errors->has('descripcion_admin') ? 'siError':'noError' }}">	
	
		{!! Form::label('descripcion_jugador', 'Descripcion:', []) !!}
		{!! Form::textArea('descripcion_jugador',null , ['class'=>'form-control','rows'=>2]) !!}
		<div class="form-group errorLogin">
			<h6 id="error_desc">{{ $errors->has('descripcion_admin') ? $errors->first('descripcion_admin'):'' }}</h6>    
		</div>
	</div>
</div>