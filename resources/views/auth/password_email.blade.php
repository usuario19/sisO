@extends('plantillas.main')
@section('title')
	SisO: Login
@endsection
@section('content')

<div class="container table-responsive-xl col-md-4">
	<div class="card">
		<div class="card-header text-center">
				<h5>RECUPERAR CONTRASEÑA</h5>
		</div>
		<div class="card-body">
		  
		  	{!! Form::open(['method' => 'POST']) !!}			
			<div class="form-row">
				<div class="form-group col-md-12 {{ $errors->has('email') ? 'siError':'' }} ">
					{!! Form::label('email', 'Email', []) !!}
			      	{!! Form::text('email', null , ['class' =>'form-control', 'placeholder'=>'example@example.com', 'id'=>'email']) !!}
				     <div class="form-group errorLogin">
				    	<h6 id="error_ci">{{ $errors->has('email') ? $errors->first('email'):'' }}</h6></span>
				    </div>
			  
			    </div>
			
			    
		 	</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					{!! Form::submit('Ingresar', ['class'=>'btn btn-info btn-block', 'id'=>'buttonLogin']) !!}
					<a href="{{ route('password.request') }}" class="btn btn-link">Olvidaste tu contaseña?.</a>
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