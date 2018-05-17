@extends('plantillas.main')
@section('title')
	SisO: Login
@endsection
@section('content')
<div class="container col-md-10">
	<h1 class="display-4">Login</h1>
	<br>
</div>

<div class="container col-md-9">
	
	{!! Form::open(['route'=>'login','method' => 'POST' ] ) !!}
				
		<div class="form-row">
			<div class="form-group col-md-6">
				{!! Form::label('ci', 'Usuario', []) !!}
		      	{!! Form::text('ci', null , ['class' =>'form-control', 'placeholder'=>'Login']) !!}
		    </div>
	 	</div>
 		<div class="form-row">
 			<div class="form-group col-md-6">
 				{!! Form::label('password', 'Passsword', []) !!}
 				{!! Form::password('password', ['class' =>'form-control']) !!}
 			</div>
 		</div>

			{!! Form::submit('Ingresar', ['class'=>'btn btn-primary']) !!}
		
	{!! Form::close() !!}
</div>
@endsection