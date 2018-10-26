@extends('plantillas.main')

@section('title')
    SisO - Lista de jugadores
@endsection

@section('content')
<h1>Todos los jugadores:</h1>
  <div class="form-row">
    <table class="table table-borderless">
      <thead></thead>
      <tbody>
        <tr>
          <td>{!! Form::label('club', 'Seleccione club:', []) !!}</td>
          <td>{!! Form::label('genero', 'Seleccione genero:', []) !!}</td>
          <td></td>
        </tr>
        <tr>
          <td width="350px">{!! Form::select('club', $clubs,0,['class'=>'form-control','id'=>'club']) !!}</td>
          <td width="350px">{!! Form::select('genero', ['0'=>'Mostrar Todo', '1'=>'Femenino', '2'=>'Masculino'],0,['class'=>'form-control', 'id'=>'genero']) !!}</td>
        </tr>
      </tbody>  
    </table>
  </div>
  <div class="table-responsive-xl">
    <table class="table table-striped table-container">
        <thead>
          <tr class=" ">
            <th width="20px">ID</th>
            <th>Clubs</th>
            <th>Foto</th>
            <th>CI</th>
            <th>Nombre <br>Completo</th>
            <th>Genero</th>
            <th>Correo</th>
            <th>Fecha de <br>nacimiento</th>
            <th width="150px">Descripcion</th>
            <th colspan="2">Acciones</th>
          </tr>
          
        </thead>
        <tbody id="datos">
          
        </tbody>
    </table>
  </div>
@endsection
@section('scripts')
  {!! Html::script('/js/filtro_club_genero.js') !!}
@endsection