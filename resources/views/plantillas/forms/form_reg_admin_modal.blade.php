<div class="modal fade bd-example-modal-lg" id="modalRegADmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Registrar coordinador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <div>inicio</div> -->
        <div class="container col-md-12">

          <div id="mensaje" class="alert alert-success alert-dismissible show" role="alert" style="display: none">
            <strong>El Usuario fue registrado exitosamente!!!!</strong>
            <button type="button" class="close" aria-label="Close" onclick="document.getElementById('mensaje').style.display = 'none';">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        
      </div>
      <br>
        
<div class="container col-md-12">
  
  {!! Form::open(['route'=>'administrador.store','method' => 'POST' ,'id'=>'form_create','enctype' => 'multipart/form-data', 'files'=>true] ) !!}

    <div class="form-row">

      <div class="form-group" style="min-width: 200px">
        <div class="form-row">
          <div class="form-group col-md-12">
            <div class="contenedor_modal">
              <img id="imgOrigen" class="rounded mx-auto d-block float-left imgtam" src="/storage/fotos/usuario-sin-foto.png" alt="" {{--  style="height=200px ; width=200px"  --}}>
              
              <div id="divtexto">
                  <a id="btnCancelar" class="btn btn-outline-dark button noVista">
                      <span class="btn_hover ">
                          <i id="btnCancelar" class="material-icons float-left" style="color:white">clear</i>
                      </span>
                  </a>
                  
                  <a id="texto" class="btn btn-dark button vista">
                    <span class="btn_hover ">
                        <i id="texto" class="material-icons float-left" style="color:white">edit</i>
                    </span>
                  </a>
                </div>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-12 {{ $errors->has('foto_admin') ? 'siError':'' }}">
            <div style="display:none">
              {!! Form::file('foto_admin', ['class'=>'upload','id'=>'input']) !!}
            </div>
          </div>
          <div class="form-row errorLogin">
              <span>
                <h6 id="error_foto">{{ $errors->has('foto_admin') ? $errors->first('foto_admin'):'' }}</h6>
              </span>
          </div>
        </div>
      </div>
      
      <div class="form-group col-lg-8" >
        @include('plantillas.forms.form_reg_admin')
        <div class="form-group col-md-6">
            {!! Form::label('tipo', 'Tipo de Usuario', []) !!}
            
            {!! Form::select('tipo',['Administrador'=>'Administrador','Coordinador'=>'Coordinador'] ,'Coordinador', ['class'=>'form-control']) !!}
          
            
          </div>
          
          </div>
        <div class="form-row">
          <div class="form-group col-md-6 {{ $errors->has('password') ? 'siError':'noError' }}">
            {!! Form::label('password', 'Contraseña', []) !!} 
          {!! Form::password('password', ['class' => 'form-control']) !!}
          <div class="form-group errorLogin">
              
              <h6 id="error_password">{{ $errors->has('password') ? $errors->first('password'):'' }}</h6>
              
        </div>
        </div>
          <div class="form-group col-md-6 {{ $errors->has('password_confirmation') ? 'siError':'noError' }}">
            {!! Form::label('password_confirmation', 'Confirma tu contraseña', []) !!}  
          {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
          <div class="form-group errorLogin">
              
              <h6 id="error_confirmation"></h6>
              
          </div>
          </div>
        </div>
  
      <div class="form-row">
          <div class="form-group col-md-12 {{ $errors->has('descripcion_admin') ? 'siError':'noError' }}">
            {!! Form::label('descripcion_admin', 'Descripcion', []) !!}
            {!! Form::textArea('descripcion_admin',null , ['class'=>'form-control','rows'=>2]) !!}
          
        <div class="form-group errorLogin">
            <h6 id="error_desc">{{ $errors->has('descripcion_admin') ? $errors->first('descripcion_admin'):'' }}</h6>    
        </div>
       </div>
        </div>

        <br>
        <div class="form-row">
        <div class="form-group col-md-6">
          {!! Form::submit('Crear cuenta', ['class'=>'btn btn-primary btn-block','id'=>'buttonReg']) !!}
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> -->
        </div>
        <div class="form-group col-md-6">
          <a href="" class="btn btn-block btn-secondary" data-dismiss="modal" id="buttonClose">Cancelar</a>
        </div>
      </div>
    </div>
  </div>
    
  {!! Form::close() !!}
</div>


        <!-- <div></div> -->
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Registrar</button>
      </div> -->
    </div>
  </div>
</div>