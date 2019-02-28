@extends('admin.plantilla_info_us')



@section('nav')
<nav class="navbar navbar-expand-lg menu">
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
</nav>
@endsection
@section('contenido_nav')
{!! Form::model($usuario,['route'=>['administrador.update',$usuario->id_administrador],'method' => 'PUT' ,'id'=>'form_update','enctype' => 'multipart/form-data', 'files'=>true]) !!}
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
        
          <div class="form-group col-md-6">
            {!! Form::label('mi_password', 'Ingrese su contraseña', []) !!} 
            {!! Form::password('mi_password', ['class' => 'form-control']) !!}
            <div class="form-group">
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
  
  <div class="form-row">
    <div class="form-group col-md-6">
      {!! Form::label('newpassword', 'Nueva contraseña', []) !!} 
      {!! Form::password('newpassword', ['class' => 'form-control']) !!}
      <div class="form-group">
      </div>
    </div>
                        
    <div class="form-group col-md-6" >
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
  
{!! Form::close() !!}
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
  {!! Html::script('/Jcrop/js/jquery.min.js') !!}
  {!! Html::script('/Jcrop/js/jquery.Jcrop.min.js') !!}
  {!! Html::script('/js/jcrop_imagen.js') !!}

@endsection