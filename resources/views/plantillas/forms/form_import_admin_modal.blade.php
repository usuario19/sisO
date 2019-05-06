{!! Form::open(['route'=>'administrador.importExcel','method'=>'POST','enctype'=>'multipart/form-data','files'=>true,'id'=>'form-import-admin']) !!}
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
            
                
                <div class="row">
                  
                    <div class="form-group col-12">
                        <div class="custom-file">
                          <input name="file_excel" type="file" class="custom-file-input" id="excel_file" accept=".xlsx,.xls">
                          <div class="form-group"></div>
                          <label class="custom-file-label" for="excel_file">Seleccionar Archivo</label>
                        </div>
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
                  <button "reset" class="btn btn-block btn-outline-secondary btn_cerrar_modal_import" data-dismiss="modal" id="buttonClose">Cancelar</button>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
{!! Form::close() !!}