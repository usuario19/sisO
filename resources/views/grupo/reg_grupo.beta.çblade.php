@extends('plantillas.main')
@section('title')
SisO:Crear Grupo
@endsection
<script>
		function grupos(){
			var cantidad = document.getElementById('cant_grupos');
			var formulario1 = document.getElementById('formGrupo1');
			var formulario2 = document.getElementById('formGrupo2');
			var formulario3 = document.getElementById('formGrupo3');
			
		    if(cantidad.selectedIndex = 1)
		    {
		      formulario1.style.display = 'block';
		      formulario2.style.display = 'none';
		      formulario3.style.display = 'none';
		    }else{
		    	if (cantidad.selectedIndex = 2) {
		    		formulario2.style.display = 'block';
		    		formulario1.style.display = 'none';
		    		formulario3.style.display = 'none';

		    	}else{
		    	if (cantidad.selectedIndex = 3) {
		    		formulario3.style.display = 'block';
		    		formulario1.style.display = 'none';
		    		formulario2.style.display = 'none';

		    	}
		    	else{
		    		formulario1.style.display = 'none';
		    		formulario2.style.display = 'none';
					formulario3.style.display = 'none';
		    		formulario4.style.display = 'none';

		    	}
		    }
		    }
	    }
	
</script>
@section('content')
<div class="container col-md-8">
	<h1 class="display-4">Crear Grupo</h1>
	<br>
</div>
<div class="container col-md-6">
	{!! Form::open(['route'=>'grupo.store','metod'=>'POST','enctype'=>'multipart/formdata']) !!}	
	<div class="form-row">
		<div class="form-group col-md-12">
			{!! Form::label('grupos', 'Cantidad de grupos', []) !!}
			{!! Form::select('cant_grupos', ['1'=> '1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','15'=>'15','20'=>'20'], null ,['id'=>'cant_grupos','onClick'=>'grupos()','onChange'=>'grupos()','class'=>'form-control']) !!}
		</div>
	</div>
	<div id="formGrupo1" style="display: none">
				<div class="form-row">
					<div class="form-group col-md-12">
						{!! Form::label('nombre', 'Nombre', []) !!}
						{!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
					</div>
				</div>
	</div>
	<div id="formGrupo2" style="display: none">
		@for ($i = 0; $i < 2; $i++)
			<div class="form-row">
					<div class="form-group col-md-12">
						{!! Form::label('nombre'.$i, 'Nombre', []) !!}
						{!! Form::text('nombre'.$i, null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
					</div>
				</div>
		@endfor
				
	</div>
	<div id="formGrupo3" style="display: none">
		@for ($i = 0; $i < 3; $i++)
			<div class="form-row">
					<div class="form-group col-md-12">
						{!! Form::label('nombre'.$i, 'Nombre', []) !!}
						{!! Form::text('nombre'.$i, null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
					</div>
				</div>
		@endfor
				
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			{!! Form::submit('Crear Grupos', ['class'=>'btn btn-primary']) !!}
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection