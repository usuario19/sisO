@extends('plantillas.main')
@section('title')
SisO:Crear Grupo
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

<script>
		function grupos(){
			var cantidad = document.getElementById('cant_grupos');
			//for (var i = 0; i < 20; i++) {
				var formulario1 = document.getElementById('formGrupo1');	
				var formulario2 = document.getElementById('formGrupo2');	
				var formulario3 = document.getElementById('formGrupo3');	
				var formulario4 = document.getElementById('formGrupo4');	
				var formulario5 = document.getElementById('formGrupo5');	
				var formulario10 = document.getElementById('formGrupo10');	
				var formulario15 = document.getElementById('formGrupo15');	
			
		    switch(cantidad.selectedIndex){
		        case 0:
		            formulario1.style.display = 'block';
				    formulario2.style.display = 'none';
				    formulario3.style.display = 'none';
				    formulario4.style.display = 'none';
				    formulario5.style.display = 'none';
				    formulario10.style.display = 'none';
		           break;
		    
		   		case 1:
		            formulario2.style.display = 'block';
		    		formulario1.style.display = 'none';
		    		formulario3.style.display = 'none';
		    		formulario4.style.display = 'none';
				    formulario5.style.display = 'none';
				    formulario10.style.display = 'none';
		            break;
		        case 2:
		            formulario3.style.display = 'block';
			    	formulario1.style.display = 'none';
			    	formulario2.style.display = 'none';
			    	formulario4.style.display = 'none';
			    	formulario5.style.display = 'none';
			    	formulario10.style.display = 'none';
		            break;
		        case 3:
		            formulario4.style.display = 'block';
			    	formulario1.style.display = 'none';
			    	formulario2.style.display = 'none';
			    	formulario3.style.display = 'none';
			    	formulario5.style.display = 'none';
			    	formulario10.style.display = 'none';
		            break;
		        case 4:
		            formulario5.style.display = 'block';
			    	formulario1.style.display = 'none';
			    	formulario2.style.display = 'none';
			    	formulario3.style.display = 'none';
			    	formulario4.style.display = 'none';
			    	formulario10.style.display = 'none';
		            break;
		        case 5:
		            formulario10.style.display = 'block';
			    	formulario1.style.display = 'none';
			    	formulario2.style.display = 'none';
			    	formulario3.style.display = 'none';
			    	formulario4.style.display = 'none';
			    	formulario5.style.display = 'none';
		            break;
		     }

		    
		}
	
</script>
@section('content')
<div class="container col-md-8">
	<h4 class="display-4">Crear Grupo</h4>
	
</div>
<div class="container col-md-6">
	{!! Form::open(['route'=>'grupo.store','metod'=>'POST','enctype'=>'multipart/formdata']) !!}	
	<div class="form-row">
		<div class="form-group col-md-12">
			{!! Form::label('grupos', 'Cantidad de grupos', []) !!}
			{!! Form::select('cant_grupos', ['1'=> '1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','10'=>'10','15'=>'15'], null ,['id'=>'cant_grupos','onclick'=>'grupos()','onchange'=>'grupos()','class'=>'form-control']) !!}
		</div>
	</div>
	<div style="display: none">
				<div class="form-row">
						<div class="form-group col-md-12">
							{!! Form::text('id_fase', $id_fase, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
							{!! Form::text('id_gestion', $gestion->id_gestion, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
							{!! Form::text('id_disc', $id_disc, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
						</div>
					</div>	
	</div>
					
	<div id="formGrupo1" style="display: none">
		<div class="card">	
			<div class="card-body">
				<div class="form-row">
						<div class="form-group col-md-12">
							{!! Form::label('nombre', 'Nombre', []) !!}
							{!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
						</div>
					</div>	
			</div>
					
		</div>
					
	</div>
	<div id="formGrupo2" style="display: none">
		
			@for ($i = 0; $i < 2; $i++)
			<div class="card">
				<div class="card-body">
				<div class="form-row">
						<div class="form-group col-md-12">
							{!! Form::label('nombre', 'Nombre', []) !!}
							{!! Form::text('nombre'.$i, null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
						</div>
					</div>
					</div>
	</div> <br>
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
	</div> <br>
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
	</div>
	<br>
			@endfor		
	
	</div>
	<div id="formGrupo10" style="display: none">
		
			@for ($i = 15; $i < 25; $i++)
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
	<div class="form-row">
		<div class="form-group col-md-6">
			{!! Form::submit('Crear Grupos', ['class'=>'btn btn-primary']) !!}
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection