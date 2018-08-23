@extends('plantillas.main')
@section('title')
SisO:Crear Grupo
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="container col-md-8">
	<h1 class="display-4">Crear Grupo</h1>
	<br>
</div>
<div class="container col-md-6">
	{!! Form::open(['route'=>'grupo.crearGrupos','metod'=>'POST','enctype'=>'multipart/formdata']) !!}	
	<div class="form-row">
		<div class="form-group col-md-12">
			{!! Form::label('grupos', 'Cantidad de grupos', []) !!}
			{!! Form::select('cant_grupos', ['1'=> '1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','15'=>'15','20'=>'20'], null ,['id'=>'cant_grupos','class'=>'form-control']) !!}
		</div>
	</div>
	<div style="display: none">
		{!! Form::text('id_fase', $id_fase, []) !!}
		
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			{!! Form::submit('Crear Grupos', ['class'=>'btn btn-primary']) !!}
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection