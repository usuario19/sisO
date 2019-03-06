@extends('plantillas.main')

@section('title')
    SisO - Lista de Campeonatos
@endsection

@section('content')
@include('gestiones.modal_registrar_gestion')
<div class="container">
<div class= "card">
        <table class="table table-sm table-bordered">
            <thead>
                <th>
                    <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                        <h4 class="">LISTA DE CAMPEONATOS</h4></td>
                    </div>
                </th>
            </thead>
            <tbody>
            <tr> 
            <td>
            <div style="float: left;" class="form-group col-md-10">
                {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
            </div>
            <div style="float: left;" class="form-group col-md-2">
                    <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modalGestion">Agregar</button>
                </div>
            </td>
            </tr>
        </tbody>
        </table>
        <div class="table-responsive-xl">
            <table class="table table-condensed">
            <thead>
                <th>NO</th>
                <th>Nombre</th>
                <th>Sede</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </thead>
            <tbody id="datos">
                @php($i=1)
                @foreach($gestiones as $gestion)
                    <tr id="fila.{{ $gestion->id_gestion }}" onMouseOver="ResaltarFila('fila.{{ $gestion->id_gestion }}');" onMouseOut="RestablecerFila('fila.{{ $gestion->id_gestion}}')" onClick="CrearEnlace('{{ route('gestion.show',$gestion->id_gestion) }}');" style="cursor: pointer">
                        <td>{{ $i}}</td>
                        <td>{{ $gestion->nombre_gestion}}</td>
                        <td>{{ $gestion->sede}}</td>
                        <td>{{ $gestion->fecha_ini}}</td>
                        <td>{{ $gestion->fecha_fin}}</td>
                        <td>{{ $gestion->desc_gest}}</td>
                        <td class="text-center"><a href="{{ route('gestion.destroy',$gestion->id_gestion) }}">
                            <i title="Eliminar" class="material-icons delete_button">delete</i>
                            </a>
                        </td>
                    </tr>
                    @php($i++)
                @endforeach
            </tbody>
        </table>
        </div>
        
</div></div>
<script language="javascript" type="text/javascript">
    // RESALTAR LAS FILAS AL PASAR EL MOUSE
    function ResaltarFila(id_fila) {
        document.getElementById(id_fila).style.backgroundColor = '#E5EBEB';
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
@endsection
  @section('scripts')
  {!! Html::script('/js/filtrar_por_nombre.js') !!}
  {!! Html::script('/js/checkbox.js') !!}
  @endsection

