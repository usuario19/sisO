@extends('plantillas.main')

@section('title')
    SisO - Informacion de jugador
@endsection
@section('cdn')
  {!! Html::style('/Jcrop/css/jquery.Jcrop.css') !!}
@endsection
@section('content')
<div class="container">
  <div id="mensaje" class="alert alert-success alert-dismissible show" role="alert" style="display: none">
    La informacion se actualizo exitosamente!!!!
  </div>
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb  alert-info">
        <li class="breadcrumb-item"><a href="{{ route('jugador.index')}}">Jugadores</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $usuario->nombre_jugador ." ". $usuario->apellidos_jugador }}</li>
      </ol>
    </nav>


  <div class="form-row">
    <div class="container col-xl-3">
      <table class="table table-sm table-borderless mx-auto" style="width: 230px">
        <tbody class="bg-light">
            <tr>
                <td style="padding: 0px">
                  <div id="contenedor_info"  {{--  class="form-group col-md-12"  --}}>
                    <div class="" {{--  style="position:relative"  --}}>
                      <div class="mx-auto">
                          <div class="text-center" id="contenedor">
                              <img id="imgOrigen" class="img-thumbnail rounded mx-auto d-block imginfo" src="/storage/fotos/{{ $usuario->foto_jugador }}" alt="" >
                              <div id="divtexto">
                                <a id="btnCancelar"  title="Cancelar" class="btn btn-outline-dark button noVista">
                                    <span class="btn_hover ">
                                        <i id="btnCancelar" class="material-icons float-left" style="color:white">clear</i>
                                    </span>
                                </a>
                                <a id="btnUpdate" title="Actualizar imagen" class="btn btn-outline-dark button noVista">
                                    <span class="btn_hover ">
                                        <i id="btnUpdate" class="material-icons float-left" style="color:white">loop</i>
                                    </span>
                                </a>
                                <a id="crop" title="Recortar imagen" class="btn btn-dark button vista" data-toggle="modal" data-target="#modalCrop" style="display:none">
                                  <span class="btn_hover ">
                                      <i id="crop" class="material-icons float-left" style="color:white">crop</i>
                                  </span>
                                </a>
                                <a id="texto" title="Editar imagen" class="btn btn-dark button vista">
                                  <span class="btn_hover ">
                                      <i id="texto" class="material-icons float-left" style="color:white">edit</i>
                                  </span>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @include('admin.modal_crop_jugador')
                    </td>
                  </tr>
                  <tr class="">
                    <td class="dato">
                          <div class="dato form-row m-1">
                              <span class="dato display-1" style="font-size:16px; font-weight:bold ;color:#1B547A">{{ "Jugador(a)" }}</span>
                          </div>
                          <div class="dato form-row m-1">
                            <span class="dato display-1" style="font-size:15px">{{ $usuario->nombre_jugador ." ". $usuario->apellidos_jugador }}</span>
                          </div>
                          <div class="form-row errorLogin m-1">
                              <h6 id="error_foto">{{ $errors->has('foto_jugador') ? $errors->first('foto_jugador'):'' }}</h6>
                          </div>
                        </td>
                      </tr>
                  </tbody>
                </table>
              </div>
    <div class="container col-xl-9">
      <div class="card-header" style="padding: 0%">
          <div class="" style="padding: 0%">
              @yield('nav')
          </div>
      </div>
      <div class="card-body">
        <div class="table-responsive-xl">
        @yield('contenido_nav')
        {!! Form::open(['route'=>['jugador.updateFoto'],'method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true]) !!}

          <div class="form-row">
            <div class="{{ $errors->has('foto_jugador') ? 'siError':'' }}">                            
              <div id="div_file" style="display: none;">
                {!! Form::text('id_jugador',$usuario->id_jugador, []) !!}
                {!! Form::file('foto_jugador', ['class'=>'upload','id'=>'input']) !!}
                <div style="display: none">
                  {!! Form::submit('Actualizar foto', ['class'=>'btn btn-primary', 'id'=>'buttonUpdate']) !!}
                </div>
              </div>                             
            </div>
          </div>
          
        {!! Form::close() !!}
      </div>
      </div>
    </div>
  </div>
</div>


@endsection

