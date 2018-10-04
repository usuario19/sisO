@extends('plantillas.main')
@section('title')
	SisO: Registrar jugadores
@endsection
@section('content')
<div class="container col-md-10">
	<h1 class="display-4">Registrar Jugadores: </h1><br>
	<br>
</div>
<div class="container col-md-10">
	<div class="form-row">
		<div class="form-group">
			<img class="rounded mx-auto d-block float-left" src="/storage/fotos/muestra_excel.png" alt="img no encontrada" height="300px" width="800px">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group">
			<a href="/storage/archivos/planilla_jugadores.xlsx"><span>Planilla de jugadores</span></a>
		</div>
	</div>

	{!! Form::open(['route'=>'jugador.importExcel','method'=>'POST','enctype'=>'multipart/form-data','files'=>true]) !!}
		
		<div class="form-row">
			<div class="form-group">
				<div>
					{!! Form::label('id_club', 'id club:', []) !!}
					{!! Form::text('id_club',$id, ['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="form-group">
				<div class="form-group col-md-6 {{ $errors->has('file_excel') ? 'siError':'noError' }}">
					{!! Form::label('file_excel', 'Archivo Excel:', []) !!}
					{!! Form::file('file_excel', ['class'=>'form-control']) !!}
				</div>
				<div class="form-group errorLogin">
                            
						<h6 id="error_file_excel">{{ $errors->has('file_excel') ? $errors->first('file_excel'):'' }}</h6>
						
					</div>
			</div>
		</div>

		<div  class="form-row">
			<div class="form-group">
				<div> {!! Form::submit('Registrar Jugadores', ['class'=>'btn btn-primary']) !!}</td></tr> </div>
			</div>
		</div>
		
			
	{!! Form::close() !!}
</div>
@endsection
@section('scripts')
  {{--  {!! Html::script('js/script.js') !!}  --}}
@endsection