@section('gestiones')
<div class="form-row">
	<div class="form-group col-md-4">
		{{-- {!! Form::label('gestiones', 'Gestiones', []) !!}
		{!! Form::select('gestiones', $gestiones, null, ['href'=>"{{ route('gestion.configurar',$gestion->id_gestion) }}",'id'=>'gestiones','class'=>'form-control']) !!} --}}
		<select name="gestiones" id="gestiones" onchange="location=this.value">
			@foreach ($gestiones as $gest)
				<option value="{{ route('gestion.configurar',$gestion->id_gestion) }}"> {{ $gest }}
			@endforeach
			
		</select>
	</div>
</div>
@endsection