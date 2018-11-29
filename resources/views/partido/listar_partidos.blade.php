@extends('plantillas.main')
@section('title')
	SisO: Partidos
@endsection
@section('content')
<div class="container table-responsive-xl">
        <div id="mensaje_error" class="alert alert-warning alert-dismissible" role="alert" style="display: none">
                <strong></strong>Todos los campos son requeridos para la consulta.
                <button type="button" class="close" aria-label="Close" onclick="this.parentElement.style.display='none';">
                        <span aria-hidden="true">&times;</span>
                </button>
        </div>
	<div class="table-responsive-xl">
			<div class="container col-md-12">
                <div class="col-md-12 text-center" style="padding: 10px 0px">
                    <strong><h4 class="display-1"  style="font-size: 18px">ENCUENTROS</h4></strong>
                </div> 
                <div class="card">
                    <div class="card-body" style="padding: 0%">
                        <div>
                            <div class="container">
                                {!! Form::open(['route'=>'partido.clubs_encuentros','id'=>'consultar_partidos','method' => 'POST','enctype' => 'multipart/form-data', 'files'=>true] ) !!} 
                                <div class="form-row">
                                    <div class="form-group col-md-3" style="padding: 10px">
                                        {!! Form::label('id_club', 'Club', []) !!}
                                        <select name="id_club" id="id_partido_club" class="form-control">
                                            @foreach ($mis_clubs as $dato)
                                                @if (key($mis_clubs) == 0)
                                                    <option value="{{ key($mis_clubs) }}" disabled selected >{{ $dato}}</option>
                                                @else
                                                    <option value="{{ key($mis_clubs) }}">{{ $dato}}</option>
                                                @endif
                                                @php
                                                    next($mis_clubs)
                                                @endphp
                                            @endforeach
                                            
                                        </select>
                                        {{--  {!! Form::select('id_club', $mis_clubs,'', ['class' => 'form-control', 'id'=>'id_partido_club']) !!}  --}}
                                    </div>
                                    <div class="form-group col-md-3" style="padding: 10px">
                                        {!! Form::label('id_gestion', 'Gestion', ['class' => 'float-left']) !!}
                                        <div id="cargando_gest" style="display: none; padding:0 0 0 20px " class="float-left">
                                            <img src="/storage/logos/loader.gif" alt="" height="20">
                                        </div>
                                        
                                        {!! Form::select('id_gestion', $gestiones,'', ['class' => 'form-control', 'disabled', 'id'=>'id_partido_gest']) !!}
                                    </div>
                                    <div class="form-group col-md-3" style="padding: 10px">
                                            {!! Form::label('id_disc', 'Disciplina', ['class' => 'float-left']) !!}
                                            <div id="cargando_disc" style="display: none; padding:0 0 0 20px " class="float-left">
                                                <img src="/storage/logos/loader.gif" alt="" height="20">
                                            </div>
                                            {!! Form::select('id_disc', $disciplinas,'', ['class' => 'form-control', 'disabled', 'id'=>'id_partido_disc']) !!}
                                        </div>
                                
                               
                                {{--  <div class="form-row">
                                    <div class="col-md-12 ">  --}}
                                        <div class="form-group col-md-3 mx-auto" style="padding: 10px; margin-top: 28px">
                                                {!! Form::label('v', ' ') !!}
                                            {!! Form::submit('Aceptar', ['class'=>'btn btn-primary btn-block float-right','id'=>'buttonReg']) !!}
                                        </div>
                                    </div>
                                    {{--  </div>
                                </div>  --}}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
			<div id="contenido">
                <div class="container col-md-12">
                    
                    <div class="card">
                        <div class="card-body">

                        </div>
                        
                    </div>
                </div>
			</div>
			
	</div>
</div>
@endsection
@section('scripts')
  {!! Html::script('/js/partido_obtener_gestiones.js') !!}
  {!! Html::script('/js/consultar_partidos.js') !!}

  <script>
        (function(){
            window.addEventListener('load', active_link, false);
            function active_link(){
                document.getElementById('partidos').className += " active";
            }
        }());
        </script>
@endsection