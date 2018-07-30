@extends('plantillas.main')
@section('title')
	SisO: Editar Datos
@endsection
@section('content')
<div class="container col-md-10">
	<h1 class="display-4">Actualizar datos Jugador</h1><br>
</div>
<div class="container col-md-9">
	{!! Form::model($usuario,['route'=>['jugador.update',$usuario->id_jugador],'method' => 'PUT' ,'enctype' => 'multipart/form-data', 'files'=>true]) !!}


		<div class="form-row">
			<div class="form-group col-md-4">
				<div class="form-row">
					<div id="contenedor" class="form-group col-md-12">
						<img id="imgOrigen" class="rounded mx-auto d-block float-left" src="/storage/fotos/{{$usuario->foto_jugador  }}" alt="" height="200px" width="200px">
						<img id="imgParcial" height="200px" width="200px" class="noVista" src="" alt="">
					</div>
				</div>
				<div class="form-row">
					<div id="div_file" class="form-group col-md-2">
							<img id="texto" src="/storage/fotos/subir.png"  alt="">
							{!! Form::file('foto_jugador', ['class'=>'upload','id'=>'input']) !!}
					</div>
					<div class="form-group col-md-2" id="content">
						<div><img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png"  alt=""></div>
					</div>
				</div>
			</div>
			<div class="form-group col-md-8" >
				<div class="form-row">
					<div class="form-group col-md-12">
						<table class="table table-sm">
						  
						  <tbody>
						    <tr>
						      
							  @include('plantillas.forms.form_reg_jugador')
							  <tr><td colspan="2">{!! Form::submit('Actualizar datos de jugador', ['class'=>'btn btn-primary']) !!}</td></tr>
						    </tr>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection
@section('scripts')
  {!! Html::script('/js/script.js') !!}
@endsection