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

<div class=" container col-md-11 table-responsive-xl">

    <div class="">
      <div class="card-" style="padding-top: 5px; height: 35px">
          <div class="reporte col-md-12" >
              <h4 class="lista_sub">INFORMACION</h4>
          </div>
          <br>
      </div>
        <div class="margin_top card-body">
          <div class="form-row col-md-12 table-responsive-xl">
            <div class="" id="contenedor_info"  style="width: 260px">
                        
                <div id="contenedor_perfil">
                  <img id="imgOrigen" class="img-thumbnail rounded mx-auto d-block imginfo_perfil" src="/storage/fotos/{{ $usuario->foto_admin }}" alt="">
                  {{--  <div id="divtexto">
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
                  </div>  --}}
                </div>

                {{--<  div class="form-row errorLogin">
                            
                    <h6 style="text-align: center" id="error_foto">{{ $errors->has('foto_admin') ? $errors->first('foto_admin'):'' }}</h6>
                
                </div>  --}}
            </div>
        
            <div class="informacion container col-md-8" style="margin-right: 0%">

              
                  <div class="form-row noVista">
                        <div class="form-group col-md-12">
                          {!! Form::label('id_administrador', 'ID', []) !!}
                          {!! Form::text('id_administrador',$usuario->id_administrador , ['class'=>'form-control','id'=>'id']) !!}
                        </div>
                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-12">
                        {!! Form::label('nombre', 'Nombre', []) !!}
                            {!! Form::text('nombre', $usuario->nombre , ['class' =>'form-control', 'placeholder'=>'Nombres','disabled','style'=>'background: #deecfd;border: #deecfd; height:40px']) !!}
                        </div>
                
                        <div class="form-group col-md-12">
                          {!! Form::label('apellidos', 'Apellidos', []) !!}
                          {!! Form::text('apellidos', $usuario->apellidos, ['class' =>'form-control', 'placeholder'=>'Apellidos','disabled','style'=>'background: #deecfd;border: #deecfd; height:40px']) !!}
                        </div>
                     </div>
                
                     <div class="form-row">
                      <div class="form-group col-md-6">
                        {!! Form::label('genero', 'Genero', []) !!}
                        {!! Form::text('genero', ($usuario->genero==1)? 'Femennino': 'Masculino', ['class' =>'form-control', 'placeholder'=>'Apellidos','disabled','style'=>'background: #deecfd;border: #deecfd; height:40px']) !!}
                      </div>
                      <div class="form-group col-md-6">
                          {!! Form::label('ci', 'CI', []) !!}
                          {!! Form::text('ci', $usuario->ci , ['class'=>'form-control', 'placeholder'=>'','disabled','style'=>'background: #deecfd;border: #deecfd; height:40px']) !!}
                        </div>
                    </div>
                
                        
                       <div class="form-row">
                      <div class="form-group col-md-12">
                          {!! Form::label('fecha_nac', 'Fecha de Nacimiento', []) !!}
                          {!! Form::text('fecha_nac', $usuario->fecha_nac , ['class'=>'form-control', 'placeholder'=>'','disabled','style'=>'background: #deecfd;border: #deecfd; height:40px']) !!}
                        </div>
                       <div class="form-group col-md-12">
                          {!! Form::label('email', 'Correo electronico', []) !!}
                          {!! Form::text('email', $usuario->email , ['class' =>'form-control', 'placeholder'=>'example@example.com','style'=>'background: #deecfd;border: #deecfd; height:40px']) !!}
                      </div>
                      </div>
                   
                  <div class="form-row">
                        <div class="form-group col-md-12">
                          {!! Form::label('descripcion_admin', 'Descripcion', []) !!}
                          {!! Form::textArea('descripcion_admin',$usuario->descripcion_admin , ['class'=>'form-control','rows'=>4,'disabled','style'=>'background: #deecfd;border: #deecfd']) !!}
                      </div>
                </div>
            </div>
          

         {{--   {!! Form::open(['route'=>['administrador.updateFoto'],'method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true]) !!}

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
              
          {!! Form::close() !!}  --}}
        </div>

      </div>
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