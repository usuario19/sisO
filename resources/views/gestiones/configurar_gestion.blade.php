@extends('plantillas.main')
@section('title')
SisO:Configurar gestion
@endsection
@section('submenu')

@endsection

@section('content')
<div class="form-row">
	@include('plantillas.menus.menu_gestion')

<div class="col-md-9">
	<div class="">
			<div class="reporte container col-md-10">
				<h4 class="lista_sub_rep">CONFIGURACION</h4>
			</div>
		{!! Form::open(['route'=>['gestion.update'],'metod'=>'POST','enctype'=>'multipart/formdata','id'=>'form_update']) !!}	
		<div class="container col-md-10">
					<div style="display:none">
						<div class="form-group col-md-12">
							{!! Form::text('id_gestion',$gestion->id_gestion, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							{!! Form::label('nombre','Nombre', []) !!}
							{!! Form::text('nombre_gestion',$gestion->nombre_gestion, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
                    		<div class="form-group"></div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							{!! Form::label('fechaIni', 'Fecha de inicio', []) !!}
							{!! Form::date('fecha_ini', $gestion->fecha_ini, ['class'=>'form-control']) !!}
			
                    		<div class="form-group"></div>
						</div>
						<div class="form-group col-md-6">
							{!! Form::label('fechaFin', 'Fecha de Fin', []) !!}
							{!! Form::date('fecha_fin', $gestion->fecha_fin, ['class'=>'form-control']) !!}
                    		<div class="form-group"></div>
						</div>
					</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								{!! Form::label('sede','Sede', []) !!}
								{!! Form::text('sede',$gestion->sede, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
                    		<div class="form-group"></div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								{!! Form::label('descripcion', 'Descripcion', []) !!}
								{!! Form::textarea('descripcion', $gestion->desc_gest, ['class'=>'form-control','placeholder'=>'Descripcion', 'rows'=> 4]) !!}
                    		<div class="form-group"></div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
										<div class="form-group col-md-12">
									{!! Form::label('activo', 'Estado de Gestion', []) !!}
								</div>
								@if ($gestion->estado_gestion == 1)
								<div class="form-row col-md-12">
									<div class="form-group col-md-6">
											{!! Form::label('activo', 'Activa', []) !!}			
											{!! Form::radio('estado_gestion',1,true,['class'=>'form-check form-check-inline']) !!}
                    						<div class="form-group"></div>
									</div>
									<div class="form-group col-md-6">
										{!! Form::label('activo', 'Desactivada', []) !!}
										{!! Form::radio('estado_gestion',0,false,['class'=>'form-check form-check-inline']) !!}
									</div>
									</div>
								@else
								<div class="form-row col-md-12">
									<div class="form-group col-md-6">
											{!! Form::label('activo', 'Activa', []) !!}			
											{!! Form::radio('estado_gestion',1,false,['class'=>'form-check form-check-inline']) !!}
                    					<div class="form-group"></div>
									</div>
									<div class="form-group col-md-6">
										{!! Form::label('activo', 'Desactivada', []) !!}
										{!! Form::radio('estado_gestion',0,true,['class'=>'form-check form-check-inline']) !!}
										
									</div>
									</div>
								@endif
							</div>
							<div class="form-group col-md-12">
									<div class="form-group col-md-12">
								{!! Form::label('activo', 'Periodo de Inscripcion', []) !!}
								</div>
								@if ($gestion->periodo_inscripcion == 1)
								<div class="form-row col-md-12">
								<div class="form-group col-md-6">
											{!! Form::label('activo', 'Activa', []) !!}			
											{!! Form::radio('periodo_inscripcion', 1, true,['class'=>'form-check form-check-inline']) !!}
                    					<div class="form-group"></div>
									</div>
									<div class="form-group col-md-6">
									{!! Form::label('activo', 'Desactivada', []) !!}
									{!! Form::radio('periodo_inscripcion', 0, false,['class'=>'form-check form-check-inline']) !!}
								</div>
								</div>
									
								@else
								<div class='form-row col-md-12'>
								<div class="form-group col-md-6">
											{!! Form::label('activo', 'Activa', []) !!}			
											{!! Form::radio('periodo_inscripcion', 1, false,['class'=>'form-check form-check-inline']) !!}
                    					<div class="form-group"></div>
									</div>
									<div class="form-group col-md-6">
										{!! Form::label('activo', 'Desactivada', []) !!}
										{!! Form::radio('periodo_inscripcion', 0, true,['class'=>'form-check form-check-inline']) !!}
									</div></div>
								
									
								@endif	
						</div>
						</div>
						<div class="form-row">
								<div class="form-group col-md-6">
								<button class="button_spiner btn btn-block btn-success" type="button" disabled style="display:none">
									<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
									Cargando...
									</button>
						{!! Form::submit('aceptar', ['class'=>'btn btn-block btn_aceptar']) !!}
						</div>
						<div class="form-group col-md-6">
						{!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary btn_cerrar']) !!}
						</div>
						</div>			
							
	</div>
	{!! Form::close() !!}
	</div>
</div>
</div>

@endsection
@section('scripts')
  {!! Html::script('/js/filtrar_por_nombre.js') !!}
  {!! Html::script('/js/checkbox.js') !!}
  {!! Html::script('/js/validaciones.js') !!}
  {!! Html::script('/js/reset_inputs.js') !!}
  {!! Html::script('/js/validacion_ajax_request_gestion_update.js') !!}
@endsection