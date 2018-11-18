@extends('plantillas.main')
@section('title')
SisO:Configurar gestion
@endsection
@section('submenu')

@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="container col-md-10">
	<div class="card">
		{{--  <div class="card-header" style="padding: 0%">
			<div class="row title-table col-md-11">
				<h3 class="display-6" style="float: left; font-size: 12px;padding: 10px 0% ">CONFIGURACION</h3>
			</div>
		</div>  --}}
		<div class="card-body">
				<div class="container col-md-8">

						{!! Form::open(['route'=>['gestion.update',$gestion->id_gestion],'metod'=>'POST','enctype'=>'multipart/formdata']) !!}	
							<div class="form-row">
								<div class="form-group col-md-6">
									{!! Form::label('nombre','Nombre', []) !!}
									{!! Form::text('nombre',$gestion->nombre_gestion, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
								</div>
					
								<div class="form-group col-md-6">
										{!! Form::label('sede','Sede', []) !!}
										{!! Form::text('sede',$gestion->sede, ['class'=>'form-control','placeholder'=>'Sede']) !!}
									</div>
							</div>
							
							<div class="form-row">
								<div class="form-group col-md-12">
									{!! Form::label('descripcion', 'Descripcion', []) !!}
									{!! Form::textarea('descripcion', $gestion->desc_gest, ['class'=>'form-control','placeholder'=>'Descripcion', 'rows'=> 4]) !!}
								</div>
							</div>
					
							<div class="form-row">
								<div class="form-group col-md-6">
									{!! Form::label('fechaIni', 'Fecha de inicio', []) !!}
									{!! Form::date('fecha_ini', $gestion->fecha_ini, ['class'=>'form-control']) !!}
					
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('fechaFin', 'Fecha de Fin', []) !!}
									{!! Form::date('fecha_fin', $gestion->fecha_fin, ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row col-md-6" style="padding: 20px 0%">
									<div class="form-group col-md-6">
											
										{!! Form::submit('Actualizar', ['class'=>'btn btn-primary btn-block']) !!}
						
									</div>
								<div class="form-group col-md-6">
									<button class="btn btn-secondary btn-block">Cancelar</button>
									
					
								</div>
							</div>
						{!! Form::close() !!}
					</div>
		</div>
	</div>

</div>

@endsection