@extends('plantillas.main')
@section('title')
SisO:Editar Disciplina
@endsection
@section('content')
<div class="container col-md-8">
	<h1 class="display-4">Editar Disciplina</h1>
	<br>
</div>

<div class="container col-md-9">

	{!! Form::model($disciplina, ['route'=>['disciplina.update',$disciplina->id_disc],'method'=>'PUT','enctype'=>'multipart/form-data','file'=>true]) !!}
	<div class="form-row">
		<div class="form-group col-md-4">
			<div class="form-row">
					<div class="form-group col-md-12">
						<img id="imgOrigen" class="rounded mx-auto d-block float-left" src="/storage/foto_disc/{{ $disciplina->foto_disc }}" alt="" height="200px" width="200px" >
							<img id="imgParcial" height="200px" width="200px" class="noVista" src="" alt="">
						</div>

					</div>
					<div class="form-row">
						<div class="form-group col-md-5">
							
							<div id="div_file">
								<img id="texto" src="/storage/fotos/subir.png"  alt="">
								{!! Form::file('foto_disc', ['class'=>'upload','id'=>'input']) !!}
							</div>
						</div>

						<div class="form-group col-md-5" id="content" style="">
							<div><img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png"  alt=""></div>
						</div>
					</div>
		</div>
				
	<div class="form-group col-md-8">
		<div class="form-row">
		<div class="form-group col-md-12">
			{!! Form::label('nombre_disc', 'Nombre Disciplina', []) !!}
			{!! Form::text('nombre_disc',$disciplina->nombre_disc, ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-12">
			{!! Form::label('reglamento_disc', 'Subir reglamento', []) !!}
			{!! Form::file('reglamento_disc', ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-12">

			{!! Form::label('descripcion_disc', 'Descripcion Disciplina', []) !!}
			{!! Form::textArea('descripcion_disc',$disciplina->descripcion_disc, ['class'=>'form-control' ,'rows'=>4]) !!}
		</div>
	</div>
	<br>
	<div class="form-row">
		<div class="form-group col-md-12">

			{!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
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
