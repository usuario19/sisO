<div class="modal fade bd-example-modal-lg" id="modalCrop" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modalLabel">Recortar imagen</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body" style="max-height: 500px; overflow: auto">
                <div class="text-center mx-auto">
                  <img id="imgCrop" src="/storage/fotos/{{ $usuario->foto_admin }}" alt="">
                </div>
            </div>
            <div class="modal-footer">
                    <div class="form-group col-md-6">
                      <button id="button_crop" class="btn btn-success btn-block">Aceptar</button>
                    </div>
                    <div class="form-group col-md-6">
                      <a class="btn btn-block btn-outline-secondary" data-dismiss="modal" id="buttonClose">Cancelar</a>
                    </div>
              </div>
          </div>
        </div>
      </div>