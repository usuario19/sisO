@extends('plantillas.main')
@section('title')
SisO:Crear Grupo
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="content">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
			<li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
			<li class="breadcrumb-item"><a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}">Grupos</a></li>         			
		</ol>
	</nav>
</div>
<div class="container col-md-8">
	<h4 class="display-4">Crear Grupos</h4>
</div>
<div class="container col-md-6">
	{!! Form::open(['route'=>'grupo.store','metod'=>'POST','enctype'=>'multipart/formdata']) !!}	
	<div class="form-row">
		<div class="form-group col-md-12">
			{!! Form::label('grupos', 'Cantidad de grupos', []) !!}
			{!! Form::select('cant_grupos', ['1'=> '1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','10'=>'10'], null ,['placeholder'=>'seleccione...','id'=>'cant_grupos','onclick'=>'grupos()','onchange'=>'grupos()','class'=>'form-control']) !!}
		</div>
	</div>
	<div style="display: none">
				<div class="form-row">
						<div class="form-group col-md-12">
							{!! Form::text('id_fase', $fase->id_fase, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
							{!! Form::text('id_gestion', $gestion->id_gestion, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
							{!! Form::text('id_disc', $disciplina->id_disc, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
						</div>
				</div>	
	</div>		
	<div id="formGrupo1" style="display: none">
		<div class="card">	
			<div class="card-body">
				<div class="form-row">
						<div class="form-group col-md-12">
							{!! Form::label('nombre', 'Nombre', []) !!}
							{!! Form::text('nombre',null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
						</div>
					</div>	
			</div>	
		</div>		
	</div>
	<br>
	<div id="formGrupo2" style="display: none">
			@for ($i = 0; $i < 2; $i++)
			<div class="card">
				<div class="card-body">
					<div class="form-row">
						<div class="form-group col-md-12">
							{!! Form::label('nombre', 'Nombre', []) !!}
							{!! Form::text('nombre'.$i,null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
						</div>
					</div>
				</div>
			</div> 
			<br>
			@endfor	
	</div>

	<div id="formGrupo3" style="display: none">
		@for ($i = 2; $i < 5; $i++)
			<div class="card">
				<div class="card-body">
					<div class="form-row">
						<div class="form-group col-md-12">
							{!! Form::label('nombre'.$i, 'Nombre', []) !!}
							{!! Form::text('nombre'.$i, null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
						</div>
					</div>
				</div>
			</div> 
			<br>
		@endfor		
	</div>
	<div id="formGrupo4" style="display: none">
		@for ($i = 5; $i < 9; $i++)
			<div class="card">
				<div class="card-body">
					<div class="form-row">
						<div class="form-group col-md-12">
							{!! Form::label('nombre'.$i, 'Nombre', []) !!}
							{!! Form::text('nombre'.$i, null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
						</div>
					</div>
				</div>
			</div> <br>
		@endfor	
	</div>
	<div id="formGrupo5" style="display: none">
		@for ($i = 9; $i < 14; $i++)
			<div class="card">
				<div class="card-body">
					<div class="form-row">
						<div class="form-group col-md-12">
							{!! Form::label('nombre'.$i, 'Nombre', []) !!}
							{!! Form::text('nombre'.$i, null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
						</div>
					</div>
				</div>
			</div><br>
		@endfor	
	</div>
	<div id="formGrupo10" style="display: none">
		@for ($i = 14; $i < 24; $i++)
			<div class="card">
				<div class="card-body">
					<div class="form-row">
						<div class="form-group col-md-12">
								{!! Form::label('nombre'.$i, 'Nombre', []) !!}
								{!! Form::text('nombre'.$i, null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
						</div>
					</div>
				</div>
			</div><br>
		@endfor		
	</div>
	<div class="form-row">
		<div class="form-group col-md-12 form-inline">
			<div class="form-group col-md-6">
				{!! Form::submit('Aceptar', ['class'=>'btn btn-primary btn-block']) !!}
			</div>
			<div class="form-group col-md-6">
				<button href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}" class="btn btn-secondary btn-block">Cancelar</button>	
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection
@section('scripts')
{!! Html::script('/js/crearGrupo.js') !!}
@endsection