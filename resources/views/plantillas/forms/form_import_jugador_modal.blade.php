{!! Form::open(['route'=>'jugador.importExcel','method'=>'POST','enctype'=>'multipart/form-data','files'=>true]) !!}
<div class="modal fade bd-example-moadl-lg" id="modalImportJugador" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Registrar jugadores</h5>
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
            <div class="container col-md-12">
              <div class="form-row">
                <div class="form-group">
                  <img class="rounded mx-auto d-block float-left" src="/storage/fotos/muestra_excel.png" alt="img no encontrada" height="150px" width="650px">
                </div>
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
         
                
                <div class="form-row">
                  
                  <div class="form-group col-12">
                    <div class="custom-file">
                      {!! Form::file('file_excel', ['class'=>'custom-file-input','id'=>'excel_file','accept'=>".xlsx,.xls"]) !!}
                      <div class="form-group"></div>
                      <label class="custom-file-label" for="excel_file">Seleccionar Archivo</label>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        <div class="modal-footer">
            <div  class="form-row col-md-12">
                <div class="form-group col-md-6">
                  {!! Form::submit('Importar', ['class'=>'btn btn_aceptar btn-block','id'=>'buttonSubmit','disabled']) !!}
                </div>
                <div class="form-group col-md-6">
                  <a href="" class="btn btn-block btn-outline-secondary btn_cerrar_modal_import" data-dismiss="modal" id="buttonClose">Cancelar</a>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}