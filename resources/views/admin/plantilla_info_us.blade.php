@extends('plantillas.main')

@section('title')
    SisO - Informacion de usuario
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
        <li class="breadcrumb-item"><a href="{{ route('administrador.index')}}">Coordinadores</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $usuario->nombre ." ". $usuario->apellidos }}</li>
      </ol>
    </nav>

<div class="row table-responsive-xl">
    <div class="container col-xl-3">
      <table class="table table-sm mx-auto table-bordered" style="width: 230px">
        <tbody>
            <tr>
                <td style="padding: 0px">
                  <div id="contenedor_info"  {{--  class="form-group col-md-12"  --}}>
                    <div class="" {{--  style="position:relative"  --}}>
                      <div class="mx-auto">
                          <div class="text-center" id="contenedor">
                              <img id="imgOrigen" class="mx-auto d-block imginfo" src="/storage/fotos/{{ $usuario->foto_admin }}" alt="" >
                              <div id="divtexto">
                                <a id="btnCancelar" title="Cancelar" class="btn btn-outline-dark button noVista">
                                    <span class="btn_hover ">
                                        <i id="btnCancelar" class="material-icons float-left" style="color:white">clear</i>
                                        
                                    </span>
                                </a>
                                <a id="btnUpdate" title="Actualizar imagen"  class="btn btn-outline-dark button noVista">
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
                  @include('admin.modal_crop')
                </td>
            </tr>
            <tr>
              <td>
                <div class="form-row m-1">
                  <span class=" display-1" style="font-size: 18px; font-weight:100;color:#0366D6">{{ {{--  strtoupper  --}}($usuario->tipo )." :" }}</span>
                  <span class=" display-1" style="font-size: 16px">{{ $usuario->nombre ." ". $usuario->apellidos }}</span>
          
                </div>
                <div class="form-row errorLogin">
                      <h6 id="error_foto">{{ $errors->has('foto_admin') ? $errors->first('foto_admin'):'' }}</h6>
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
              {{--  <nav class="navbar navbar-expand-lg menu">
                  <ul class="navbar-nav btn-block">
                      <li class="nav-item link col-md-4">
                        <a class="nav-link link active col-md-12" href={{ route('administrador.informacion',$usuario->id_administrador) }}>Configuración <span class="sr-only">(current)</span></a>
                      </li>
                    <li class="nav-item link col-md-4">
                      <a class="nav-link link  col-md-12" href="{{ route('administrador.informacion_club',$usuario->id_administrador) }}">Clubs que administra</a>
                    </li>
                    <li class="nav-item link col-md-4">
                      <a class="nav-link link col-md-12" href="{{ route('administrador.informacion_club_resultados',$usuario->id_administrador) }}">Participación</a>
                    </li>
                  </ul>
              </nav>  --}}
          </div>
      </div>
    <div class="card-body">
        @yield('contenido_nav')
    {{--  {!! Form::model($usuario,['route'=>['administrador.update',$usuario->id_administrador],'method' => 'PUT' ,'id'=>'form_update','enctype' => 'multipart/form-data', 'files'=>true]) !!}
            <div class="container col-md-12">
              
                   <div class="form-row noVista">
                          <div class="form-group col-md-12">
                            {!! Form::label('id_administrador', 'ID', []) !!}
                            {!! Form::text('id_administrador',$usuario->id_administrador , ['class'=>'form-control','id'=>'id']) !!}
                          </div>
                    </div>

                 @include('plantillas.forms.form_reg_admin')

                <div class="form-group col-sm-12">
                  {!! Form::label('tipo', 'Tipo de Usuario', []) !!}
                  {!! Form::select('tipo',['Administrador'=>'Administrador','Coordinador'=>'Coordinador'] , $usuario->tipo, ['class'=>'form-control']) !!}
                </div>
                  
            
            <div class="form-row">
                  <div class="form-group col-md-6 {{ $errors->has('descripcion_admin') ? 'siError':'noError' }}">
                    {!! Form::label('descripcion_admin', 'Descripcion', []) !!}
                    {!! Form::textArea('descripcion_admin',null , ['class'=>'form-control','rows'=>4]) !!}
                  
                    <div class="form-group errorLogin">
                        <h6 id="error_desc">{{ $errors->has('descripcion_admin') ? $errors->first('descripcion_admin'):'' }}</h6>    
                    </div>
            </div>
            @if(Auth::User()->id_administrador == $usuario->id_administrador)
                    
                      <div class="form-group col-md-6 {{ $errors->has('mi_password') ? 'siError':'noError' }}">
                        {!! Form::label('mi_password', 'Ingrese su contraseña', []) !!} 
                        {!! Form::password('mi_password', ['class' => 'form-control']) !!}
                        <div class="form-group errorLogin">
                            
                            <h6 id="error_mi_password">{{ $errors->has('mi_password') ? $errors->first('mi_password'):'' }}</h6>
                            
                        </div>
                      </div>
                     
                    </div>
            @else
                  </div>
            @endif


            <div class="form-row">
                
                <div class="form-group col-md-6">
                  {!! Form::checkbox('editar', 1, false, ['class' => 'field','id'=>'editar']) !!}
                  {!! Form::label('editar', 'Editar contraseña', []) !!}
                </div>
            </div>

            <div id="editarDiv" style="display: none"> 
              <div class="form-group errorLogin">
                        
                <h6 id="error_newpassword">{{ $errors->has('newpassword') ? $errors->first('newpassword'):'' }}</h6>
              
              </div>
              <div class="form-row">
                <div class="form-group col-md-6 {{ $errors->has('newpassword') ? 'siError':'noError' }}">
                  {!! Form::label('newpassword', 'Nueva contraseña', []) !!} 
                  {!! Form::password('newpassword', ['class' => 'form-control']) !!}
                    
                </div>
                                    
                <div class="form-group col-md-6 {{ $errors->has('newpassword') ? 'siError':'noError' }}" >
                  {!! Form::label('newpassword_confirmation', 'Confirma tu nueva contraseña', []) !!}  
                  {!! Form::password('newpassword_confirmation', ['class' => 'form-control']) !!}
                  <div class="form-group errorLogin">
                      <h6 id="error_confirmation"></h6>   
                  </div>
                </div>
              </div>

            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                {!! Form::submit('Guardar', ['class'=>'btn btn-success btn-block']) !!}
              </div>
              <div class="form-group col-md-6">
                <a href="" class="btn btn-block btn-outline-secondary">Cancelar</a>
              </div>                  
            </div>
          </div>  
    </div>
              
    {!! Form::close() !!}  --}}
          

          {!! Form::open(['route'=>['administrador.updateFoto'],'method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true]) !!}

              <div class="form-row">
                          <div class="{{ $errors->has('foto_admin') ? 'siError':'' }}">                            
                            <div id="div_file" style="display: none;">
                              {!! Form::text('id_administrador',$usuario->id_administrador, []) !!}
                              {!! Form::file('foto_admin', ['class'=>'upload','id'=>'input']) !!}
                              <div style="display: none">
                                {!! Form::submit('Actualizar foto', ['class'=>'btn btn-primary btn-block', 'id'=>'buttonUpdate']) !!}
                              </div>
                            </div>                             
                          </div>
              </div>
              
          {!! Form::close() !!}
        </div>

      </div>
</div>
</div>



@endsection

