@extends('plantillas.main')

@section('title')
    SisO - Lista de Fases
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <h1>Lista de Fase:</h1>
    <a href="{{ route('fase.create',[$id_disc,$id_gestion]) }}" class="btn btn-primary">Agregar Fase</a>
  </div> 
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFase">Agregar</button>

<div class="modal fade" id="modalFase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar fase</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form>
          <div class="form-group">
            {!! Form::label('nombre', 'Nombre', []) !!}
      {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('tipo', 'Tipos', []) !!}
      <br>
      <div class="card">
        <div class="card-body">
          <div class="form-row">
            
              @foreach ($tipos as $tipo)
              <div class="form-group col-md-4">
                {!! Form::<!DOCTYPE html>
                <html>
                <head>
                  <title></title>
                </head>
                <body>
                
                </body>
                </html>radio('tipo',$tipo->id_tipo,null,['id'=>'series','class'=>'radio']) !!}
                {!! Form::label('series',$tipo->nombre_tipo, []) !!}
                </div>
              @endforeach       
          </div>  
          </div>
        </form>
      </div>
      <div>
        <div style="display: none;">
        {!! Form::text('id_disc', $id_disc, []) !!}
        {!! Form::text('id_gestion', $id_gestion, []) !!}
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Grupos</th>
  		</thead>
  		<tbody>

  			@foreach($fases as $fase)
  				<tr>
  					<td>{{ $fase->id_fase}}</td>
            <td>{{ $fase->nombre_fase }}</td>
            <td>{{ $fase->nombre_tipo}}</td>
            <td><a href="{{ route('fase.listar_grupos',$fase->id_fase) }}" class="btn btn-success">ver grupos</a></td>
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection