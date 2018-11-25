@extends('plantillas.main')
@section('title')
	SisO: Partidos
@endsection
@section('content')
<div class="container table-responsive-xl">
	<div class="table-responsive-xl">
			<div class="container col-md-10">
                <div class="col-md-12 text-center" style="padding: 10px 0px">
                    <h4 class="">ENCUENTROS</h4>
                </div> 
                <div class="card">
                    <div class="card-body bg-light" style="padding: 0%">
                        <div>
                            <div class="container">
                                {!! Form::open(['route'=>'partido.clubs_encuentros','method' => 'POST','enctype' => 'multipart/form-data', 'files'=>true] ) !!} 
                                <div class="form-row">
                                    <div class="form-group col-md-4" style="padding: 10px">
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
                                    <div class="form-group col-md-4" style="padding: 10px">
                                        {!! Form::label('id_gestion', 'Gestion', ['class' => 'float-left']) !!}
                                        <div id="cargando_gest" style="display: none; padding:0 0 0 20px " class="float-left">
                                            <img src="/storage/logos/loader.gif" alt="" height="20">
                                        </div>
                                        
                                        {!! Form::select('id_gestion', $gestiones,'', ['class' => 'form-control', 'disabled', 'id'=>'id_partido_gest']) !!}
                                    </div>
                                    <div class="form-group col-md-4" style="padding: 10px">
                                            {!! Form::label('id_disc', 'Disciplina', ['class' => 'float-left']) !!}
                                            <div id="cargando_disc" style="display: none; padding:0 0 0 20px " class="float-left">
                                                <img src="/storage/logos/loader.gif" alt="" height="20">
                                            </div>
                                            {!! Form::select('id_disc', $disciplinas,'', ['class' => 'form-control', 'disabled', 'id'=>'id_partido_disc']) !!}
                                        </div>
                                </div>
                               
                                <div class="form-row">
                                    <div class="col-md-12 ">
                                        <div class="form-group col-md-4 float-right" style="padding: 10px">
                                            {!! Form::submit('Aceptar', ['class'=>'btn btn-primary btn-block float-right','id'=>'buttonReg']) !!}
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
			<div id="contenido">
                <div class="container col-md-10">
                    <div class="col-md-12 text-center" style="padding: 10px 0px">
                        <h4 class="">ENCUENTROS</h4>
                    </div> 
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body bg-light" style="padding: 0%">

                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Fase 1
                                        </button>
                                        </h5>
                                    </div>
                                
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <th>
                                                        Nombre fecha
                                                    </th>
                                                    <th>
                                                        FEcha del partido
                                                    </th>
                                                    <th>
                                                        hora del partido
                                                    </th>
                                                    <th>
                                                        lugar del encuentro
                                                    </th>
                                                    <th>
                                                        detalle
                                                    </th>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                          </div>
                        </div>
                    </div>
                </div>
			</div>
			
	</div>
</div>
@endsection
@section('scripts')
  {!! Html::script('/js/partido_obtener_gestiones.js') !!}

@endsection