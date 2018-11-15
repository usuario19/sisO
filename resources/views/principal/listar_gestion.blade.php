@extends('plantillas.main')

@section('title')
    SisO - Lista de gestiones
@endsection

@section('content')
<div class="container-fluid">
    <div class="container text-center">
        <h1>GESTIONES</h1>
    </div>
</div>

<script language="javascript" type="text/javascript">
    // RESALTAR LAS FILAS AL PASAR EL MOUSE
    function ResaltarFila(id_fila) {
        document.getElementById(id_fila).style.backgroundColor = 'rgb(229, 235, 235)';
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
<div class="container">
        <div class="table-responsive-xl">
        <table class="table table-condensed">
              <thead>
                 {{--   <th>ID</th>  --}}
            <th>Nombre</th>
            <th>Fecha de Inicio</th>
                  <th>Fecha de Fin</th>
            <th>Descripcion</th>
                 
            
            
              </thead>
              <tbody>
                  @foreach($gestiones as $gestion)
            
                      <tr id="fila.{{ $gestion->id_gestion }}" onMouseOver="ResaltarFila('fila.{{ $gestion->id_gestion }}');" onMouseOut="RestablecerFila('fila.{{ $gestion->id_gestion}}')" onClick="CrearEnlace('{{ route('gestion.show',$gestion->id_gestion) }}');" style="cursor:pointer">
                          {{--  <td>{{ $gestion->id_gestion}}</td>  --}}
                          <td>{{ $gestion->nombre_gestion}}</td>
                          <td>{{ $gestion->fecha_ini}}</td>
                <td>{{ $gestion->fecha_fin}}</td>
                          <td>{{ $gestion->desc_gest}}</td>
               
                
                      </tr>
                  @endforeach
              </tbody>
        </table>
    </div>
</div>


    @include('sweetalert::cdn') 
 @include('vendor.sweetalert.view') 
@endsection
  

