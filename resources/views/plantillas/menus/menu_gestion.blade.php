@extends('plantillas.main')

@section('title')
    SisO - Lista de Campeonatos
@endsection

@section('submenu')
<div class="form-row">
	<div class="form-group col-md-4">
		{{-- {!! Form::label('gestiones', 'Gestiones', []) !!}
		{!! Form::select('gestiones', $gestiones, null, ['href'=>"{{ route('gestion.configurar',$gestion->id_gestion) }}",'id'=>'gestiones','class'=>'form-control']) !!} --}}
		<select name="gestiones" id="gestiones" onchange="location=this.value">
			@foreach ($gestiones as $gest)
				<option value="{{ route('gestion.configurar',$gest->id_gestion) }}"> {{ $gest }}
			@endforeach
			
		</select>
	</div>
</div>

<h3>{{ $gestion->nombre_gestion }}</h3>
 <nav class="nav nav-justified navbar-light bg-secondary" >
  <a class="nav-item nav-link text-white" href="{{ route('gestion.configurar',$gestion->id_gestion) }}">Configuracion</a>
  <a class="nav-item nav-link text-white" href="{{ route('gestion.disciplinas',$gestion->id_gestion) }}">Disciplinas</a>
  <a class="nav-item nav-link text-white" href="{{ route('gestion.clubs',$gestion->id_gestion) }}">Inscripcion</a>
  <a class="nav-item nav-link text-white" href="#">Clubs</a>
  <a class="nav-item nav-link text-white" href="#">Clasificacion y Calendario</a>
</nav>
    
 
@endsection