@extends('plantillas.main')
@section('title')
	SisO: Login
@endsection
@section('content')

<div class="container table-responsive-xl col-md-4">
	<div class="card">
		<div class="card-header text-center">
				<h5>LOGIN</h5>
		</div>
		<div class="card-body">
		  
		  {!! Form::open(['route'=>'login.store','method' => 'POST']) !!}			
		<div class="form-row">
			<div class="form-group col-md-12 {{ $errors->has('email') ? 'siError':'' }} ">
				{!! Form::label('ci', 'Usuario', []) !!}
		      	{!! Form::text('ci', null , ['class' =>'form-control', 'placeholder'=>'Codigo de usuario', 'id'=>'ci']) !!}
			     <div class="form-group errorLogin">
			    	<h6 id="error_ci">{{ $errors->has('email') ? $errors->first('email'):'' }}</h6></span>
			    </div>
		  
		    </div>
		
		    
	 	</div>

 		<div class="form-row">
 			<div class="form-group col-md-12 {{ $errors->has('email') ? 'siError':'' }}">
 				{!! Form::label('password', 'Passsword', []) !!}
 				{!! Form::password('password', ['class' =>'form-control', 'id'=>'password']) !!}
 				<div class="form-group errorLogin">
			    	<h6 id="error_password">{{ $errors->has('password') ? $errors->first('password'):'' }}</h6></span>
			    </div>
 			</div>
 		
		    
	 	</div>

		<div class="form-row">
			<div class="form-group col-md-12">
				{!! Form::submit('Ingresar', ['class'=>'btn btn-info btn-block', 'id'=>'buttonLogin']) !!}
			</div>
		</div>
		
	{!! Form::close() !!}
		</div>
	  </div>
	
	
	
</div>
@endsection
@section('scripts')
	{!! Html::script('/js/login.js') !!}
@endsection