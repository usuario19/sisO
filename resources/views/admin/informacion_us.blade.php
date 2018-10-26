@extends('plantillas.main')

@section('title')
    SisO - Lista de Usuarios
@endsection

@section('content')
<div class="container col-md-12">
  <div id="mensaje" class="alert alert-success alert-dismissible show" role="alert" style="display: none">
    La informacion se actualizo exitosamente!!!!
  </div>
</div>
<h2  class="display-1" style="font-size: 16px"><a href="{{ route('administrador.index')}}">Coordinadores </a>|  {{ $usuario->nombre ." ". $usuario->apellidos }}</h2>
<br>

<div class="table-responsive-xl">
    
    <table class="table table-sm table-bordered">
      <thead>
         <th class="table"><h3 class="display-4" style="font-size: 20px">Ficha de informacion</h3></th>
      </thead>
      <tbody>
          <tr>
              <td>
                <div id="contenedor_info"  {{--  class="form-group col-md-12"  --}}>

                  <div class="form-row" {{--  style="position:relative"  --}}>
                    <div class="form-group " style="width: 140px">
                          <div id="contenedor">
                            <img id="imgOrigen" class="rounded mx-auto d-block float-left imginfo" src="/storage/fotos/{{ $usuario->foto_admin }}" alt="" >
                            <div id="divtexto">
                              <img id="texto" src="/storage/fotos/subir.png"  alt="">
                              <img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png"  alt="">
                              <img id="btnUpdate" class="noVista" src="/storage/fotos/actualizar.png"  alt="">
                            </div>
                          </div>
                    </div>
                    <div class="form-group col-md-9" style="position: relative; height:65px ;">
                            <div style="bottom: 0px; position: absolute; ">
                              <h3 class="display-1" style="font-size: 20px; font-weight:bold;">{{ strtoupper($usuario->tipo )." :" }}</h3>
                              <h3 class="display-1" style="font-size: 18px">{{ $usuario->nombre ." ". $usuario->apellidos }}</h3>
                            </div>
                          <div class="form-row errorLogin">
                            <span>
                              <h6 id="error_foto">{{ $errors->has('foto_admin') ? $errors->first('foto_admin'):'' }}</h6>
                            </span>
                          </div>
                    </div>
                  </div>  
                </div>
              </td>
          </tr>
      </tbody>
    </table>
    <div class="card">
      <div class="card-header" style="padding: 0%">
          <div class="card-header" style="padding: 0%">
              <nav class="navbar navbar-expand-lg table-bordered menu">
                  <ul class="navbar-nav btn-block">
                    <li class="nav-item link col-md-4">
                      <a class="nav-link link active col-md-12" href={{ route('administrador.informacion',$usuario->id_administrador) }}>CONFIGURACION <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item link col-md-4">
                      <a class="nav-link link  col-md-12" href="{{ route('administrador.informacion_club',$usuario->id_administrador) }}">CLUBS QUE ADMINSITRA</a>
                    </li>
                    <li class="nav-item link col-md-4">
                      <a class="nav-link link col-md-12" href="{{ route('administrador.informacion_club_resultados',$usuario->id_administrador) }}">ESTADISTICAS</a>
                    </li>
                  </ul>
            
              </nav>
          </div>
      </div>
    
    
        <div class="card-body">
            
            <div class="row title-table col-md-11">
                <h3 class="display-6" style="float: left;">INFORMACION</h3>

              </div>
          <br>
      
    {!! Form::model($usuario,['route'=>['administrador.update',$usuario->id_administrador],'method' => 'PUT' ,'id'=>'form_update','enctype' => 'multipart/form-data', 'files'=>true]) !!}
            <div class="container col-md-10">
              
                   <div class="form-row noVista">
                          <div class="form-group col-md-12">
                            {!! Form::label('id_administrador', 'ID', []) !!}
                            {!! Form::text('id_administrador',$usuario->id_administrador , ['class'=>'form-control','id'=>'id']) !!}
                          </div>
                    </div>

                 @include('plantillas.forms.form_reg_admin')

                <div class="form-group col-sm-6">
                  {!! Form::label('tipo', 'Tipo de Usuario', []) !!}
                  {!! Form::select('tipo',['Administrador'=>'Administrador','Coordinador'=>'Coordinador'] , $usuario->tipo, ['class'=>'form-control']) !!}
                </div>
                  
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
                {!! Form::submit('Guardar', ['class'=>'btn btn-primary btn-block']) !!}
              </div>
              <div class="form-group col-md-6">
                <a href="" class="btn btn-block btn-secondary">Cancelar</a>
              </div>                  
            </div>
    </div>
              
    {!! Form::close() !!}
          

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


@endsection

@section('scripts')
    <script>
      (function(){
        window.addEventListener("load", inicializarEventos, false);
        function inicializarEventos(){
          document.getElementById("editar").addEventListener("change", ocultarDiv, false);
          document.getElementById("editar").checked = false;
        }
        

       function ocultarDiv(e){
        //console.log(e.target.id);
        if(e.target.checked)
          document.getElementById("editarDiv").style.display= 'block';
        else
           document.getElementById("editarDiv").style.display = 'none';
       }
      }())
    </script>
  {!! Html::script('/js/vista_previa.js') !!}
  {!! Html::script('/js/validacion_ajax_request_update.js') !!}
  {!! Html::script('/js/validaciones.js') !!}
  

@endsection