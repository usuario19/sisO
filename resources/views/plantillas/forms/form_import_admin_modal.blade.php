<div class="modal fade" id="modalImportADmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Registrar Coordinadores</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- <div>inicio</div> -->
          <div class="table-responsive-xl">
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
              <div class="form-row">
                <div class="form-group">
                  <img class="rounded mx-auto d-block float-left" src="/storage/fotos/muestra_excel_1.png" alt="img no encontrada" height="100px" width="450px">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <a href="/storage/archivos/planilla_jugadores.xlsx">
                    <div class="button-div" style="">
                        <i class="material-icons float-left">vertical_align_bottom</i>
                        <span class="letter-size">Descargar planilla</span>
                    </div></a>
                </div>
              </div>
            
              {!! Form::open(['route'=>'administrador.importExcel','method'=>'POST','enctype'=>'multipart/form-data','files'=>true]) !!}
                
                <div class="form-row">
                  
                  <div class="form-group">
                    <div class="form-group col-md-12 {{ $errors->has('file_excel') ? 'siError':'noError' }}">
                      {!! Form::label('file_excel', 'Archivo Excel:', []) !!}
                      {!! Form::file('file_excel', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group errorLogin">               
                        <h6 id="error_file_excel">{{ $errors->has('file_excel') ? $errors->first('file_excel'):'' }}</h6>
                      </div>
                  </div>
                </div>
            </div>
          </div>

        
        <div class="modal-footer">
            <div  class="form-row">
                <div class="form-group col-md-6">
                  {!! Form::submit('Importar', ['class'=>'btn btn-primary btn-block']) !!}
                </div>
                <div class="form-group col-md-6">
                  <a href="" class="btn btn-block btn-secondary" data-dismiss="modal" id="buttonClose">Cancelar</a>
                </div>
              </div>
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>