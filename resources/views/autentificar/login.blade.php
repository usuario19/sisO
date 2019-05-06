@extends('plantillas.main')
@section('title')
	SisO: Login
@endsection
@section('content')

<div class="container" style="background: #F6F6F6">
	<br>
	<div class="form-row"  style="margin-bottom: 20px">
		<img class="rounded-circle" src="/storage/logos/user.png" alt="" height="80" width="80" style="margin: auto;">
	</div>
	<div class="mx-auto col-md-4">
			<div class="card">
				<div class="card-body" style="margin: 10px">
				  	{!! Form::open(['route'=>'login.store','method' => 'POST']) !!}			
						<div class="form-row">
							<div class="form-group col-md-12 {{ $errors->has('ci') ? 'siError':'' }} ">
								{!! Form::label('ci', 'Usuario', []) !!}
								{!! Form::text('ci', null , ['class' =>'form-control', 'placeholder'=>'Codigo de usuario', 'id'=>'ci']) !!}
								<div class="form-group errorLogin">
									<h6 id="error_ci">{{ $errors->has('ci') ? $errors->first('ci'):'' }}</h6></span>
								</div>
							</div>
						</div>
				
						<div class="form-row">
							<div class="form-group col-md-12 {{ $errors->has('password') ? 'siError':'' }}">
								{!! Form::label('password', 'Passsword', []) !!}
								{!! Form::password('password', ['class' =>'form-control', 'id'=>'password', 'placeholder'=>'***************']) !!}
								<div class="form-group errorLogin">
									<h6 id="error_password">{{ $errors->has('password') ? $errors->first('password'):'' }}</h6></span>
								</div>
							</div>
						
							
						</div>
				
						<div class="form-row">
							<div class="form-group col-md-12">
								{!! Form::submit('Ingresar', ['class'=>'btn btn-primary btn-block boton-focus', 'id'=>'buttonLogin','style'=>'background:#4267B2; border: 2px solid #4267B2']) !!}
								<br>
								<a class="mx-auto" href="{{ route('password.request') }}" style="color: black">
													<strong>{{ __('¿Olvidaste tu contraseña?') }}</strong>
								</a>
							</div>
						</div>
						
					{!! Form::close() !!}
				</div>
			</div>
	</div>
	<br><br>
</div>
@endsection
@section('scripts')
	{!! Html::script('/js/login.js') !!}
@endsection