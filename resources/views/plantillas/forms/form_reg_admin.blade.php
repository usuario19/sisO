<div class="form-row">
			<div class="form-group col-md-6">
				{!! Form::label('nombre', 'Nombre', []) !!}
		      	{!! Form::text('nombre', null , ['class' =>'form-control', 'placeholder'=>'Nombres']) !!}
			    <div class="form-group"></div>
		    </div>

		    <div class="form-group col-md-6">
		    	{!! Form::label('apellidos', 'Apellidos', []) !!}
		    	{!! Form::text('apellidos', null, ['class' =>'form-control', 'placeholder'=>'Apellidos']) !!}
		    	<div class="form-group"></div>
	    	</div>
	 	</div>

	 	<div class="form-row">
			<div class="form-group col-md-8">
				{!! Form::label('genero', 'Genero', []) !!}
			</div>
		</div>

	 	<div class="form-row">

			
				<div class="form-group col-md-4">
					{!! Form::radio('genero', 1 ,1,['id'=>'generof','class'=>'radio']) !!}
					{!! Form::label('generof', 'Femenino', []) !!}
					
				</div>
				
				<div class="form-group col-md-4">
						
					{!! Form::radio('genero', 2 ,2,['id'=>'generom','class'=>'radio']) !!}
					{!! Form::label('generom', 'Masculino', []) !!}
					
				</div>
				<div class="form-group"></div>
		</div>
   		<div class="form-row">
			<div class="form-group col-md-6">
	  			{!! Form::label('fecha_nac', 'Fecha de Nacimiento', []) !!}
	  			{!! Form::date('fecha_nac', \Illuminate\Support\Carbon::setTestNow(), ['class'=> 'form-control']) !!}
				<div class="form-group"></div>
	  		</div>

	  		<div class="form-group col-md-6">
				{!! Form::label('ci', 'CI', []) !!}
				{!! Form::text('ci', null , ['class'=>'form-control', 'placeholder'=>'','off']) !!}
				<div class="form-group"></div>
			</div>
  		</div>
		<div class="form-row">
	  		<div class="form-group col-md-12">
				{!! Form::label('email', 'Correo electronico', []) !!}
				{!! Form::text('email', null , ['class' =>'form-control', 'placeholder'=>'example@example.com']) !!}
				<div class="form-group"></div>
			</div>
		</div>
			
    	

    	