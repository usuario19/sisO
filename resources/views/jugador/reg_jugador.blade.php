@extends('plantillas.main')
@section('title')
	SisO: Registrar jugador
@endsection
@section('content')
<div class="container col-md-10">
	<h1 class="display-4">Registrar Jugadores</h1>
	<br>
</div>
<div class="container col-md-9">
	{!! Form::open(['route'=>'jugador.store','method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true] ) !!}
		
		<div class="form-row">
			<div class="form-group col-md-4">
				<div class="form-row">
					<div id="contenedor" class="form-group col-md-12">
						<img id="imgOrigen" class="rounded mx-auto d-block float-left" src="/storage/fotos/usuario-sin-foto.png" alt="" height="200px" width="200px">
						<img id="imgParcial" height="200px" width="200px" class="noVista" src="" alt="">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-5">
						
						<div id="div_file">
							<img id="texto" src="/storage/fotos/subir.png"  alt="">
							{!! Form::file('foto_jugador', ['class'=>'upload','id'=>'input']) !!}
						</div>
					</div>
					<div class="form-group col-md-5" id="content" style="">
						<div><img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png"  alt=""></div>
					</div>
				</div>
			</div>
			
			<div class="form-group col-md-8" >
				@include('plantillas.forms.form_reg_jugador')
				<div class="form-row">
				<div class="form-group col-md-12">
					{!! Form::submit('Registrar Jugador', ['class'=>'btn btn-primary']) !!}
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection