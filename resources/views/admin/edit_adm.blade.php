@extends('plantillas.main')

@section('title')
    SisO - Perfil
@endsection

@section('content')
<div class="container col-md-12">
  <div id="mensaje" class="alert alert-success alert-dismissible show" role="alert" style="display: none">
    La informacion se actualizo exitosamente!!!!
  </div>
</div>

<div class=" container col-md-8 table-responsive-xl">

    <div class="card">
      <div class="card-header" style="padding-top: 5px; height: 35px">
          <div class="row title-table col-md-12" >
              <h3 class="display-6" style="float: left; padding: 0%">CONFIGURACION:</h3>
          </div>
          <br>
      </div>
        <div class="card-body">
          <div class="form-row col-md-12 table-responsive-xl">
            <div class="" id="contenedor_info"  style="width: 200px">
                        
                <div id="contenedor_perfil">
                  <img id="imgOrigen" class="img-thumbnail rounded mx-auto d-block imginfo_perfil" src="/storage/fotos/{{ $usuario->foto_admin }}" alt="">
                  <div id="divtexto">
                      <a id="btnCancelar" title="Cancelar" class="btn btn-outline-dark button noVista">
                          <span class="btn_hover ">
                              <i id="btnCancelar" class="material-icons float-left" style="color:white">clear</i>
                              
                          </span>
                      </a>
                      <a id="btnUpdate" title="Actualizar" class="btn btn-outline-dark button noVista">
                          <span class="btn_hover ">
                              <i id="btnUpdate" class="material-icons float-left" style="color:white">loop</i>
                          </span>
                      </a>
                      <a id="texto" title="Editar" class="btn btn-dark button vista">
                      <span class="btn_hover ">
                          <i id="texto" class="material-icons float-left" style="color:white">edit</i>
                      </span>
                    </a>
                  </div>
                </div>

                <div class="form-row errorLogin">
                            
                    <h6 style="text-align: center" id="error_foto">{{ $errors->has('foto_admin') ? $errors->first('foto_admin'):'' }}</h6>
                
                </div>
            </div>
        
            <div class="container col-md-7" style="margin-right: 0%">
              {!! Form::model($usuario,['route'=>['administrador.update',$usuario->id_administrador],'method' => 'PUT' ,'id'=>'form_update','enctype' => 'multipart/form-data', 'files'=>true]) !!}
                
                  <div class="form-row noVista">
                        <div class="form-group col-md-12">
                          {!! Form::label('id_administrador', 'ID', []) !!}
                          {!! Form::text('id_administrador',$usuario->id_administrador , ['class'=>'form-control','id'=>'id']) !!}
                        </div>
                  </div>

                  @include('plantillas.forms.form_reg_admin')

                  {{--  <div class="form-group col-md-6">
                    {!! Form::label('tipo', 'Tipo de Usuario', []) !!}
                    {!! Form::select('tipo',['Administrador'=>'Administrador','Coordinador'=>'Coordinador'] , $usuario->tipo, ['class'=>'form-control']) !!}
                  </div>
                    
                  </div>  --}}
                  <div class="form-row">
                        <div class="form-group col-md-12 {{ $errors->has('descripcion_admin') ? 'siError':'noError' }}">
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
                  
                  <div class="form-row col-md-8" >
                    <div class="form-group col-md-6">
                      {!! Form::submit('Guardar', ['class'=>'btn btn-primary btn-block']) !!}
                    </div>
                    <div class="form-group col-md-6">
                      <a href="" class="btn btn-block btn-secondary">Cancelar</a>
                    </div>                  
                  </div>
                </div>
              {!! Form::close() !!}
            </div>
          

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