@extends('coordinador.plantilla.plantilla_info_jug')
@section('nav')
           
                <nav class="navbar navbar-expand-lg menu">
                    <ul class="navbar-nav btn-block">
                      <li class="nav-item link jugador col-md-6">
                        <a class="nav-link link active col-md-12" href={{ route('jugador.informacion_jug_club',[$usuario->id_jugador,$club->id_club]) }}>Configuración <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item link jugador col-md-6">
                        <a class="nav-link link  col-md-12" href="{{ route('jugador.informacion_jug_participacion',[$usuario->id_jugador,$club->id_club]) }}">Participación</a>
                      </li>
                    </ul>
              
                </nav>
           
@endsection
@section('contenido_nav')
          {!! Form::model($usuario,['route'=>['jugador.update',$usuario->id_jugador],'method' => 'PUT' ,'id'=>'form-update-jugador','enctype' => 'multipart/form-data', 'files'=>true]) !!}
            <div class="container col-md-11">
                   <div class="form-row noVista">
                          <div class="form-group col-md-12">
                            {!! Form::label('id_jugador', 'ID', []) !!}
                            {!! Form::text('id_jugador',$usuario->id_jugador , ['class'=>'form-control','id'=>'id']) !!}
                          </div>
                    </div>
                    @include('plantillas.forms.form_reg_jugador')
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        {!! Form::submit('Guardar', ['class'=>'btn btn_aceptar btn-primary btn-block']) !!}
                      </div>
                      <div class="form-group col-md-6">
                        <a href="" class="btn btn-block btn-secondary">Cancelar</a>
                      </div>                  
                    </div>

            </div>
              
          {!! Form::close() !!}
@endsection

@section('scripts')
{!! Html::script('/Jcrop/js/jquery.Jcrop.min.js') !!}
{!! Html::script('/js/jcrop_imagen.js') !!}
{!! Html::script('/js/vista_previa.js') !!}
{!! Html::script('/js/validacion_ajax_request_update_jugador.js') !!}
{!! Html::script('/js/validaciones.js') !!}

  

@endsection
