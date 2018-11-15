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
							<h1  class="display-1" style="font-size: 14px; margin:0 0 15px 0">
								<a href="{{route('coordinador.mis_gestiones')}}">Gestiones</a>
								<span>{{" | "}}</span>
								<a href="{{ route('disciplina.ver_disciplinas_inscritas',[$dato->club->id_club, $dato->gestiones->id_gestion]) }}">{{$dato->gestiones->nombre_gestion}}</a>
							</h1>
					</div>
					<div class="container input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="id_club_inf" style="color: white; background:  #85c1e9;">Disciplinas: </label>
						</div>
						{!! Form::select('id_disc',$select,$id, ['class'=>'custom-select','id'=>'id_jug_disc']) !!}</td>
					</div>
					<div id="cargando" style="display: none; padding:0 0 10px 0" class="col-md-12 text-center">
						<img src="/storage/logos/loader.gif" alt="" height="30">
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