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
	<div id="alert" class="alert alert-warning alert-dismissible fade show errores" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	
	
	{!! Form::open(['route'=>'login.store','method' => 'POST']) !!}			
		<div class="form-row">
			<div class="form-group col-md-6">
				{!! Form::label('ci', 'Usuario', []) !!}
		      	{!! Form::text('ci', null , ['class' =>'form-control', 'placeholder'=>'Login', 'id'=>'ci']) !!}
		    </div>
	 	</div>
 		<div class="form-row">
 			<div class="form-group col-md-6">
 				{!! Form::label('password', 'Passsword', []) !!}
 				{!! Form::password('password', ['class' =>'form-control', 'id'=>'password']) !!}
 			</div>
 		</div>

			{!! Form::submit('Ingresar', ['class'=>'btn btn-primary', 'id'=>'buttonLogin']) !!}
		
	{!! Form::close() !!}
</div>
@endsection
@section('scripts')
	{!! Html::script('/js/login.js') !!}
@endsection