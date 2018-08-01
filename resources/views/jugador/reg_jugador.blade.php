@extends('plantillas.main')
@section('title')
	SisO: Registrar jugador
@endsection
@section('content')
<div class="container col-md-10">
	<h1 class="display-5">Registrar Jugador</h1><br>
	<br>
</div>
<div class="container col-md-10">
	
	{!! Form::open(['route'=>'jugador.store','method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true]) !!}
		
			<div class="float-sm-left">
				<div class="form-row">
					<div id="contenedor" class="form-group col-md-12">
						<img id="imgOrigen" class="rounded mx-auto d-block float-left" src="/storage/fotos/usuario-sin-foto.png" alt="" height="200px" width="200px">
						<img id="imgParcial" height="200px" width="200px" class="noVista" src="" alt="">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						
						<div id="div_file">
							<img id="texto" src="/storage/fotos/subir.png"  alt="">
							{!! Form::file('foto_jugador', ['class'=>'upload','id'=>'input']) !!}
						</div>
					</div>
					<div class="form-group col-md-6" id="content" style="">
						<div><img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png"  alt=""></div>
					</div>
				</div>
			</div>
			<div class="float-sm-left" >
					<div class="col-md-12">
					
								@if(Auth::User()->tipo =="Coordinador")
									@if(count($mis_clubs)> 1)
										
											<!--th rowspan="{{ count($mis_clubs)+1 }}"-->
												<!--h6 class="display-6 "-->{!! Form::label('club', 'Club: ', []) !!}</h6>
												
											
										
										 @foreach($mis_clubs as $club) 

											$optionsArray = [$club->club->id_club => $club->club->nombre_club] 
										 @endforeach

													
										<!--tr>
											<th rowspan="{{ count($mis_clubs) }}"-->
												{!! Form::label('club', 'Club:', []) !!}</h6>
											
										@foreach($mis_clubs as $club)
												
													{!! Form::label('nombre_club',$club->club->nombre_club , []) !!}
													<img id="imgLog" class="rounded mx-auto d-block float-left" src="/storage/logos/{{$club->club->logo}}" alt="" height="50px" width="50px">
													{!! Form::radio('clubs',$club->club->id_club , true , []) !!}
												
										@endforeach
										
									@endif
								@endif
						    
							  @include('plantillas.forms.form_reg_jugador')

							  {!! Form::submit('Registrar Jugador', ['class'=>'btn btn-primary']) !!}</td></tr> 
						
					</div>
			</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection
@section('scripts')
  {!! Html::script('js/script.js') !!}
@endsection