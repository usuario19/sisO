@extends('plantillas.main')

@section('title')
    SisO - Lista de Clubs
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection
       
@include('sweetalert::view')
@section('content')
<div class="form-row">
  <div class="col-md-12">
      <h4>Clubs inscritos:</h4>
    </div>
    </div>
    <table class="table table-condensed table-striped">
        <thead class="">
          <th>ID</th>
          <th>Logo</th>
          <th>Nombre</th>
          <th>Ciudad</th>
          <th>Descripcion</th>        
        </thead>
        <tbody>
          @foreach($clubs_inscritos as $club)
          <tr id="fila.{{ $club->id_club }}" onMouseOver="ResaltarFila('fila.{{ $club->id_club }}');" onMouseOut="RestablecerFila('fila.{{ $club->id_club}}')" onClick="CrearEnlace('{{ route('club.listar_jugadores',[$gestion->id_gestion,$club->id_club]) }}');">
            
              <td>{{ $club->id_club}}</td>
              <td><img class="img-thumbnail" src="/storage/logos/{{ $club->logo}}" alt="" height=" 100px" width="100px"></td>
              <td>{{ $club->nombre_club}}</td>
              <td>{{ $club->ciudad}}</td>
              <td>{{ $club->descripcion_club}}</td>
          </tr>
          @endforeach
        </tbody>
  </table>
@endsection
<script language="javascript" type="text/javascript">
    // RESALTAR LAS FILAS AL PASAR EL MOUSE
    function ResaltarFila(id_fila) {
        document.getElementById(id_fila).style.backgroundColor = '#C0C0C0';
    }
     
    // RESTABLECER EL FONDO DE LAS FILAS AL QUITAR EL FOCO
    function RestablecerFila(id_fila) {
        document.getElementById(id_fila).style.backgroundColor = '#FFFFFF';
    }
     
    // CONVERTIR LAS FILAS EN LINKS
    function CrearEnlace(url) {
        location.href=url;
    }
</script>