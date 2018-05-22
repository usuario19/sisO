@extends('plantillas.main')
@section('title')
	SisO: Registrar jugador
@endsection
@section('content')
<div class="container col-md-10">
	<h1 class="display-5">Registrar Jugador</h1><br>
	<br>
</div>
<div class="container col-md-8">
	
	{!! Form::open(['route'=>'jugador.store','method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true]) !!}
		<div class="form-row">
			<div class="form-group col-md-4">
				
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<div class="form-row">
					<div id="contenedor" class="form-group col-md-12">
						<img id="imgOrigen" class="rounded mx-auto d-block float-left" src="/storage/fotos/usuario-sin-foto.png" alt="" height="200px" width="200px">
						<img id="imgParcial" height="200px" width="200px" class="noVista" src="" alt="">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-5">
						
						<div id="div_file">
							<img id="texto" src="/storage/fotos/subir.png"  alt="">
							{!! Form::file('foto_jugador', ['class'=>'upload','id'=>'input']) !!}
						</div>
					</div>
					<div class="form-group col-md-5" id="content" style="">
						<div><img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png"  alt=""></div>
					</div>
				</div>
			</div>
			<div class="form-group col-md-8" >
				<div class="form-row">
					<div class="form-group col-md-12">
						<table class="table table-sm">
						  <thead></thead>
						  <tbody>
								@if(Auth::User()->tipo =="Coordinador")
									@if(count($mis_clubs)> 1)
										<tr>
											<th scope="row" rowspan="{{ count($mis_clubs)+1 }}">
												{!! Form::label('club', 'Club:', []) !!}
											</th>
										@foreach($mis_clubs as $club)
											<tr>
												<td colspan="2">
													{!! Form::radio('clubs',$club->club->id_club , false , ['id'=>'clubs'.$club->club->id_club]) !!}

													{!! Form::label('clubs'.$club->club->id_club,$club->club->nombre_club , []) !!}
													
												</td>
											</tr>
										@endforeach
										</tr>
									@else
										<tr>
											<th scope="row" rowspan="{{ count($mis_clubs) }}">
												{!! Form::label('club', 'Club:', []) !!}
											</th>
										@foreach($mis_clubs as $club)
												<td colspan="2">
													{!! Form::label('nombre_club',$club->club->nombre_club , []) !!}
													<img id="imgLog" class="rounded mx-auto d-block float-left" src="/storage/logos/{{$club->club->logo}}" alt="" height="50px" width="50px">
													{!! Form::radio('clubs',$club->club->id_club , true , []) !!}
												</td>
										@endforeach
										</tr>
									@endif
								@endif

						    <tr>  
							  @include('plantillas.forms.form_reg_jugador')
							  <tr><td colspan="2">{!! Form::submit('Registrar Jugador', ['class'=>'btn btn-primary']) !!}</td></tr>
						    </tr>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection