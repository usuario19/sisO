@extends('plantillas.main')
@section('title')
	SisO: Seleccion
@endsection
@section('content')
<div class="container table-responsive-xl">
	<div class="table-responsive-xl">
			@foreach($datos as $dato)
			<div class="form-row">
					
					<div class="container">
							<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
									  <li class="breadcrumb-item"><a href="{{route('coordinador.mis_gestiones')}}">Gestiones</a></li>
									  <li class="breadcrumb-item"><a href="{{ route('disciplina.ver_disciplinas_inscritas',[$dato->club->id_club, $dato->gestiones->id_gestion]) }}">{{$dato->gestiones->nombre_gestion}}</a></li>
									  <li class="breadcrumb-item active" aria-current="page">Selecciones</li>
									</ol>
									</nav>
									
									<div class="container bg-primary" style="background: ;height: 40px; margin:20px 0% 0% 0%">
											<div class="form-row">
													<div class="container input-group col-md-10" style="margin-bottom: 5px ">
															<div class="input-group-prepend">
																	<label class="input-group-text" for="id_club_gestion" style="color: white; background: no-repeat; border: none;font-size: 14px;padding: 0%">DISCIPLINAS 
																			<i class = "material-icons btn" style="padding: 5px"> 
																							keyboard_arrow_right
																			</i></label>
																	</label>
															</div>
																	{!! Form::select('id_disc',$select,$id, ['class'=>'custom-select btn select_jq','id'=>'id_jug_disc']) !!}</td>
													</div>
													<div class=" input-group mb-3 col-md-12">
															<div id="cargando" style="display: ; padding:0% ; z-index: 10" class="col-md-12">
																	<img src="/storage/logos/loader2.gif" alt="" height="30">
															</div> 
													</div>
											</div>
									</div>
							<br>
					</div>
			</div>
			@endforeach

			
			<div id="contenido">

			</div>
			
	</div>
</div>
@endsection
@section('scripts')
  {!! Html::script('/js/cambiar_club_disc.js') !!}
@endsection