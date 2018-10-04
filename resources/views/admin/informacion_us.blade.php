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
<h2  class="display-1" style="font-size: 20px"><a href="{{ route('administrador.index')}}">Coordinadores </a>|  {{ $usuario->nombre ." ". $usuario->apellidos }}</h2>
<br>

<div class="table-responsive-xl">
    
    <table class="table table-sm table-bordered">
      <thead>
         <th class="table"><h3 class="display-1" style="font-size: 20px">Ficha de informacion</h3></th>
      </thead>
      <tbody>
          <tr>
              <td>
                <div id="contenedor_info"  {{--  class="form-group col-md-12"  --}}>

                  <div class="form-row" {{--  style="position:relative"  --}}>
                    <div class="form-group " style="width: 180px">
                          <div id="contenedor">
                            <img id="imgOrigen" class="rounded mx-auto d-block float-left imginfo" src="/storage/fotos/{{ $usuario->foto_admin }}" alt="" >
                            <div id="divtexto">
                              <img id="texto" src="/storage/fotos/subir.png"  alt="">
                              <img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png"  alt="">
                              <img id="btnUpdate" class="noVista" src="/storage/fotos/actualizar.png"  alt="">
                            </div>
                          </div>
                    </div>
                    <div class="form-group col-md-9" style="position: relative; height:100px ;">
                            <div style="bottom: 0px; position: absolute; ">
                              <h3 class="display-1" style="font-size: 27px; font-weight:bold;">{{ $usuario->tipo .":" }}</h3>
                              <h3 class="display-4" style="font-size: 24px">{{ $usuario->nombre ." ". $usuario->apellidos }}</h3>
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul class="navbar-nav">
          <li class="nav-item active col-md-12">
            <a class="nav-link" href={{ route('administrador.informacion',$usuario->id_administrador) }}>Configuracion <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item col-md-12">
            <a class="nav-link" href="{{ route('administrador.informacion_club',$usuario->id_administrador) }}">Clubs que administra</a>
          </li>
         
        </ul>

    </nav>
    <div class="card">
        <div class="card-body">

      
          {!! Form::model($usuario,['route'=>['administrador.update',$usuario->id_administrador],'method' => 'PUT' ,'id'=>'form_update','enctype' => 'multipart/form-data', 'files'=>true]) !!}
            <div class="container col-md-9">
                   <div class="form-row noVista">
                          <div class="form-group col-md-12">
                            {!! Form::label('id_administrador', 'ID', []) !!}
                            {!! Form::text('id_administrador',$usuario->id_administrador , ['class'=>'form-control','id'=>'id']) !!}
                          </div>
                    </div>

                 @include('plantillas.forms.form_reg_admin')

                 <div class="form-row">
                  <div class="form-group col-md-12">
                    {!! Form::label('tipo', 'Tipo de Usuario', []) !!}
                    
                    {!! Form::select('tipo',['Administrador'=>'Administrador','Coordinador'=>'Coordinador'] , $usuario->tipo, ['class'=>'form-control']) !!}
                  
                    
                  </div>
            </div>
                   <div class="form-row">
                          <div class="form-group col-md-12 {{ $errors->has('descripcion_admin') ? 'siError':'noError' }}">
                            {!! Form::label('descripcion_admin', 'Descripcion', []) !!}
                            {!! Form::textArea('descripcion_admin',null , ['class'=>'form-control','rows'=>4]) !!}
                          
                            <div class="form-group errorLogin">
                                <h6 id="error_desc">{{ $errors->has('descripcion_admin') ? $errors->first('descripcion_admin'):'' }}</h6>    
                            </div>
                          </div>
                    </div>
                    @if(Auth::User()->id_administrador == $usuario->id_administrador)
                    <div class="form-row">
                      <div class="form-group col-md-6 {{ $errors->has('mi_password') ? 'siError':'noError' }}">
                        {!! Form::label('mi_password', 'Ingrese su contraseña', []) !!} 
                        {!! Form::password('mi_password', ['class' => 'form-control']) !!}
                        <div class="form-group errorLogin">
                            
                            <h6 id="error_mi_password">{{ $errors->has('mi_password') ? $errors->first('mi_password'):'' }}</h6>
                            
                        </div>
                      </div>
                     
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