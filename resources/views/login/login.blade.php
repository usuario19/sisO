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
	
	
	
	{!! Form::open(['route'=>'login.store','method' => 'POST']) !!}			
		<div class="form-row">
			<div class="form-group col-md-6 {{ $errors->has('email') ? 'siError':'' }} ">
				{!! Form::label('ci', 'Usuario', []) !!}
		      	{!! Form::text('ci', null , ['class' =>'form-control', 'placeholder'=>'Login', 'id'=>'ci']) !!}
			     <div class="form-group errorLogin">
			    	<h6 id="error_ci">{{ $errors->has('email') ? $errors->first('email'):'' }}</h6></span>
			    </div>
		  
		    </div>
		
		    
	 	</div>

 		<div class="form-row">
 			<div class="form-group col-md-6 {{ $errors->has('email') ? 'siError':'' }}">
 				{!! Form::label('password', 'Passsword', []) !!}
 				{!! Form::password('password', ['class' =>'form-control', 'id'=>'password']) !!}
 				<div class="form-group errorLogin">
			    	<h6 id="error_password">{{ $errors->has('email') ? $errors->first('password'):'' }}</h6></span>
			    </div>
 			</div>
 		
		    
	 	</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				{!! Form::submit('Ingresar', ['class'=>'btn btn-primary', 'id'=>'buttonLogin']) !!}
			</div>
		</div>
		
	{!! Form::close() !!}
</div>
@endsection
@section('scripts')
	{!! Html::script('/js/login.js') !!}
@endsection