
@extends('plantillas.main')

@section('title')
    SisO - Lista de Clubs
@endsection
<script>
    $(document).ready(function() {
    $('.btn-danger').click(function(e) {

      e.preventDefault();

      var row = $(this).parents('tr');
      var id = row.data('id_club');
      var form = $('#form-delete');
      var url = form.attr('action').replace(':id_club', id_club);
      var data = form.serialize();

      $.post(url, data, function(result) {
        alert(result);
      });
    });
  });
</script>

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <h1>Lista de Clubs:</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal" >Agregar club </button>
  </div>
      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
              <div class="modal-content">
                      <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Agregar club</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                      </div>
                      <div class="modal-body">
                        
                            {!! Form::open(['route'=>'club.store','method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true] ) !!}
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-row">
                                                  <div id="contenedor" class="form-group col-md-2">
                                                    <img id="imgOrigen" class="rounded mx-auto d-block float-left" src="/storage/logos/sin_imagen.png" alt="" height="200px" width="200px">
                                                    <img id="imgParcial" height="200px" width="200px" class="noVista" src="" alt="">
                                                  </div>
                                              </div>
                                        
                                              <div class="form-row">
                                                  <div class="form-group col-md-2">
                                                    
                                                    <div id="div_file">
                                                      <img id="texto" src="/storage/fotos/subir.png"  alt="" height="50px" width="50px">
                                                      {!! Form::file('logo', ['class'=>'upload','id'=>'input']) !!}
                                                    </div>
                                                  </div>

                                                  <div class="form-group col-md-4" id="content" style="">
                                                    <div><img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png"  alt=""></div>
                                                  </div>
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    {!! Form::label('nombre_club', 'Nombre del Club', []) !!}
                                                {!! Form::text('nombre_club', null, ['class'=>'form-control']) !!}
                                                </div>
                                                
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-12">
                                                  {!! Form::label('id_administrador', 'Coordinador', []) !!}
                                                  {!! Form::select('id_administrador', $administradores,null, ['class'=>'form-control']) !!}
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-12">
                                                  {!! Form::label('ciudad', 'Ciudad', []) !!}
                                                  {!! Form::select('ciudad', ['Cochabamba'=> 'Cochabamba','La Paz'=>'La Paz', 'Santa Cruz'=>'Santa Cruz','Potosi'=>'Potosi','Oruro'=>'Oruro','Tarija'=>'Tarija','Chuquisaca'=>'Chuquisaca','Beni'=>'Beni','Pando'=>'Pando'], null , ['class'=>'form-control']) !!}
                                                  </div>
                                              </div>
                                        </div>
                                </div>
                                      <div class="row">
                                          <div class="col-md-12">
                                                {!! Form::label('descripcion_club', 'Descripcion', []) !!}
                                                {!! Form::textarea('descripcion_club', null, ['class'=>'form-control','rows'=>4]) !!}
                                          </div>
                                      </div>
                                 </div>
                              </div>

                                

                                  <div class="modal-footer">
                                  {!! Form::submit('Registrar Club', ['class'=>'btn btn-primary']) !!}
                                  {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-secondary']) !!}
                                  </div>
                            {!! Form::close() !!}
                           
                      </div>
                      
                          
                      
                </div>
          </div>
      </div>
</div>
  <table class="table table-condensed">
      <thead>
        <th width="50px">ID</th>
        <th width="100px">Logo</th>
        <th scope="col">Nombre</th>
        <th scope="col">Coordinador</th>
        <th scope="col">Ciudad</th>
        <th width="50px" scope="col">Descripcion</th>
        <th scope="col" >Acciones</th>
        
      </thead>
      <tbody>

        @foreach($clubs as $club)
          <tr>
            <td scope="row">{{ $club->id_club}}</td>            
            <td scope="row"><img class="img-thumbnail" src="/storage/logos/{{ $club->logo}}" alt="" height=" 100px" width="100px"></td>
            <td scope="row">{{ $club->nombre_club}}</td>
            <td scope="row">{{ $club->nombre." ".$club->apellidos}}</td>
            <td scope="row">{{ $club->ciudad}}</td>
            <td scope="row">{{ $club->descripcion_club}}</td>

            <td scope="row"><a href="{{ route('club.edit',$club->id_club) }}" class="btn btn-info">Editar</a>
              <a class="btn btn-primary" data-toggle="modal" data-target="#edit">Editar2</a>
             
                <a href="{{ route('club.destroy',$club->id_club) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
            </td>
              
  				</tr>
  			@endforeach
        
  		</tbody>
	</table>

  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
              <div class="modal-content">
                      <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Editar club</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                      </div>
                      <div class="modal-body">
                        
                            {!! Form::open(['id'=>"formEdit",'route'=>'club.store','method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true] ) !!}
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-row">
                                                  <div id="contenedor" class="form-group col-md-2">
                                                    <img id="imgOrigen" class="rounded mx-auto d-block float-left" src="/storage/logos/sin_imagen.png" alt="" height="200px" width="200px">
                                                    <img id="imgParcial" height="200px" width="200px" class="noVista" src="" alt="">
                                                  </div>
                                              </div>
                                        
                                              <div class="form-row">
                                                  <div class="form-group col-md-2">
                                                    
                                                    <div id="div_file">
                                                      <img id="texto" src="/storage/fotos/subir.png"  alt="" height="50px" width="50px">
                                                      {!! Form::file('logo', ['class'=>'upload','id'=>'input']) !!}
                                                    </div>
                                                  </div>

                                                  <div class="form-group col-md-4" id="content" style="">
                                                    <div><img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png"  alt=""></div>
                                                  </div>
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    {!! Form::label('nombre_club', 'Nombre del Club', []) !!}
                                                {!! Form::text('nombre_club', null, ['class'=>'form-control']) !!}
                                                </div>
                                                
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-12">
                                                  {!! Form::label('id_administrador', 'Coordinador', []) !!}
                                                  {!! Form::select('id_administrador', $administradores,null, ['class'=>'form-control']) !!}
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-12">
                                                  {!! Form::label('ciudad', 'Ciudad', []) !!}
                                                  {!! Form::select('ciudad', ['Cochabamba'=> 'Cochabamba','La Paz'=>'La Paz', 'Santa Cruz'=>'Santa Cruz','Potosi'=>'Potosi','Oruro'=>'Oruro','Tarija'=>'Tarija','Chuquisaca'=>'Chuquisaca','Beni'=>'Beni','Pando'=>'Pando'], null , ['class'=>'form-control']) !!}
                                                  </div>
                                              </div>
                                        </div>
                                </div>
                                      <div class="row">
                                          <div class="col-md-12">
                                                {!! Form::label('descripcion_club', 'Descripcion', []) !!}
                                                {!! Form::textarea('descripcion_club', null, ['class'=>'form-control','rows'=>4]) !!}
                                          </div>
                                      </div>
                                 </div>
                              </div>

                                

                                  <div class="modal-footer">
                                  {!! Form::submit('Registrar Club', ['class'=>'btn btn-primary']) !!}
                                  {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-secondary']) !!}
                                  </div>
                            {!! Form::close() !!}
                           
                      </div>
                      
                          
                      
                </div>
          </div>
      </div>

<script>
  $(document).ready(function() {
  
  $('.edit').click(function() {
 // echo("llego");
  $('[name=club]').val($(this).attr ('id_club'));
  
    var faction = "<?php echo URL::to('club/datosclub/datos'); ?>";
  
  var fdata = $('#val').serialize();
     $('#load').show();
    $.post(faction, fdata, function(json) {
        if (json.success) {
          //echo("llego");
            //$('#formEdit input[name="id_club"]').val(json.id_club);
           $('#formEdit text[name="nombre_club"]').val(json.nombre_club);
            //$('#formEdit input[name="ciudad"]').val(json.cuidad);
      //$('#formEdit input[name="descripcion_club"]').val(json.descripcion_club);

    };
  
  });
 
});
</script>
@endsection

@section('scripts')
  {!! Html::script('/js/script.js') !!}
@endsection