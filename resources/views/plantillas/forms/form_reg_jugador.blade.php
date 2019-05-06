<div class="form-row">
	<div class="form-group col-md-6">		
		{!! Form::label('nombre_jugador', 'Nombre:', []) !!}
		{!! Form::text('nombre_jugador', null , ['class' =>'form-control', 'placeholder'=>'Nombres']) !!}
		<div class="form-group"></div>
	</div>

	<div class="form-group col-md-6">
		{!! Form::label('apellidos_jugador', 'Apellidos:', []) !!}
		{!! Form::text('apellidos_jugador', null, ['class' =>'form-control', 'placeholder'=>'Apellidos']) !!}
		<div class="form-group"></div>
	</div>
</div>
			
<div class="form-row">
	<div class="form-group col-md-8">	
			
		{!! Form::label('genero_jugador', 'Genero:', []) !!}
	</div>
</div>	
<div class="form-row">
	<div class="form-group col-md-4">
		<div class="custom-control custom-radio">					
			{!! Form::radio('genero_jugador', 1 ,1,['id'=>'generof','class'=>'custom-control-input']) !!}
			{!! Form::label('generof', 'Femenino', ['class'=>'custom-control-label']) !!}
		</div>
	</div>
			
	<div class="form-group col-md-4">
		<div class="custom-control custom-radio">	
			{!! Form::radio('genero_jugador', 2 ,2,['id'=>'generom','class'=>'custom-control-input']) !!}
			{!! Form::label('generom', 'Masculino', ['class'=>'custom-control-label']) !!}
		</div>
	</div>
	<div class="form-group"></div>
</div>
<div class="form-row">
	<div class="form-group col-md-6">
		{!! Form::label('fecha_nac_jugador', 'Fecha de Nacimiento:', []) !!}
		{!! Form::date('fecha_nac_jugador', \Illuminate\Support\Carbon::setTestNow(), ['class'=> 'form-control']) !!}
		<div class="form-group"></div>
	</div>
	<div class="form-group col-md-6">
		{!! Form::label('ci_jugador', 'Carnet de Identidad:', []) !!}
		{!! Form::text('ci_jugador', null , ['class'=>'form-control', 'placeholder'=>'']) !!}
		<div class="form-group"></div>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-md-12">
		{!! Form::label('email_jugador', 'Email:', []) !!}
		{!! Form::text('email_jugador', null , ['class' =>'form-control', 'placeholder'=>'example@example.com']) !!}
		<div class="form-group"></div>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-md-12">	
		{!! Form::label('descripcion_jugador', 'Descripcion:', []) !!}
		{!! Form::textArea('descripcion_jugador',null , ['class'=>'form-control','rows'=>4]) !!}
		<div class="form-group"></div>
	</div>
</div>