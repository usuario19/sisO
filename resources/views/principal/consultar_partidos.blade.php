@extends('plantillas.main')
@section('title')
    SisO - Lista de disciplinas
@endsection

@section('content')
<div class="container" style="background: #8FBC8F">
        <br><br>
        <div class="mx-auto col-md-6 bg-white">
                <div class="card-body text-center" style="margin: 20px">
                    <div class="col-md-12 text-center"  style="margin-bottom: 20px">
                        <h1 class="title-principal text-center" style="color: darkgray; font-size: 30px">PARTIDOS</h1>
                    </div>
                  
                    {!! Form::open(['route'=>'login.store','method' => 'POST']) !!}			
                    <div class="form-row">
                            <div class="">
                                <label class="title-span" for="id_gestion">GESTION ACTIVA</label>
                                
                            </div>
                            <div class="input-group mb-3">
                                
                                <select class="custom-select" id="id_gestion">
                                        <option value="0" disabled selected >Selecciona una gestión</option>

                                        @foreach ($gestiones as $dato)
                                                <option value="{{ $dato->id_gestion }}">{{ $dato->nombre_gestion}}</option>
                                        @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="form-row">
                            <div class="">
                                    <label class="title-span float-left" for="id_participacion">DISCIPLINA</label>
                                    <div id="cargando_disc" style="display: none; padding:0 0 0 20px " class="float-left">
                                        <img src="/storage/logos/loader.gif" alt="" height="20">
                                    </div>
                                </div>
                        <div class="input-group mb-3">
                            
                            <select class="custom-select" id="id_participacion" disabled>
                            </select>
                        </div>
                    </div>


                    
        
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::submit('CONSULTAR', ['class'=>'btn btn-primary btn-block', 'id'=>'buttonLogin','style'=>'background:#1A73E8']) !!}
                            <br>
                            
                        </div>
                    </div>
                    
                    {!! Form::close() !!}
                </div>
        </div>
        <br><br>
    </div>
@endsection

@section('scripts')
  {!! Html::script('/js/principal_partidos_part.js') !!}
@endsection

