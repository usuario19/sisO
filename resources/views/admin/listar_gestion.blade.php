@extends('plantillas.main')

@section('title')
    SisO - Lista de Campeonatos
@endsection

@section('content')
@include('gestiones.modal_registrar_gestion')
<div class="container">
<div class= "">
        <table class="table table-sm table-bordered">
            <thead>
                <th>
                    <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                        <h4 class="lista">CAMPEONATOS</h4></td>
                    </div>
                </th>
            </thead>
            <tbody>
            <tr> 
            <td>
            <div class="contenido_lista form-row">
                <div class="form-group col-xl-9">
                          {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                      </div>
            <div class="form-group col-xl-3">
            <button type="button_add" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modalGestion">
                              <div class="button-div" style="width: 100px">
                                  <i class="material-icons float-left" style="font-size: 22px">add</i>
                                  <span class="letter-size">Agregar</span>
                              </div>
                          </button>
            </div>
                </div>
            </td>
            </tr>
        </tbody>
        </table>
        <div class="table-responsive-xl">
            <table class="table table-condensed table-hover">
            <thead>
                <th>#</th>
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
                    <tr class="link_pointer" id="fila.{{ $gestion->id_gestion }}" {{--  onMouseOver="ResaltarFila('fila.{{ $gestion->id_gestion }}');"  --}} {{--  onMouseOut="RestablecerFila('fila.{{ $gestion->id_gestion}}')"  --}} {{--  onClick="CrearEnlace('{{ route('gestion.configurar',$gestion->id_gestion) }}', event);"  --}} style="cursor: pointer" data-href="{{ route('gestion.configurar',$gestion->id_gestion) }}">
                        <td>{{ $i}}</td>
                        <td>{{ $gestion->nombre_gestion}}</td>
                        <td>{{ $gestion->sede}}</td>
                        <td>{{ $gestion->fecha_ini}}</td>
                        <td>{{ $gestion->fecha_fin}}</td>
                        <td>{{ $gestion->desc_gest}}</td>
                        <td class="text-center">
                        <a class="delete_button" href="#confirm?" data-toggle="modal" data-target="#exampleModal{{ $gestion->id_gestion }}">
                            <i title="Eliminar" class="material-icons delete_button">delete</i>
                            </a>
                            <!-- Modal -->
                            
                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModal{{ $gestion->id_gestion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header modal_advertencia">
                                <h5 class="modal-title" id="exampleModalLabel">advertencia:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body modal_advertencia">
                                ¿Esta seguro de querer eliminar esta Gestión?
                                </div>
                                <div class="modal-footer">
                                <div class="col-6">
                                    <a href="{{ route('gestion.destroy',$gestion->id_gestion) }}" class="btn btn-danger btn-block btn_eliminar"> Eliminar </a>
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-outline-secondary btn-block" data-dismiss="modal">No</a>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    @php($i++)
                @endforeach
            </tbody>
        </table>
        </div>
        
</div></div>
<script language="javascript" type="text/javascript">
    // RESALTAR LAS FILAS AL PASAR EL MOUSE
    /*function ResaltarFila(id_fila) {
        document.getElementById(id_fila).style.backgroundColor = '#E5EBEB';
    }
     
    // RESTABLECER EL FONDO DE LAS FILAS AL QUITAR EL FOCO
    function RestablecerFila(id_fila) {
        document.getElementById(id_fila).style.backgroundColor = '#FFFFFF';
    }
     
    // CONVERTIR LAS FILAS EN LINKS
    function CrearEnlace( url ,  event ) {
        elemento = event.target;
        console.log(elemento);
        if(elemento.className.indexOf('delete_button') == -1)
        {
            window.location = url;
        }else{
            console.log("no");
        }
    }*/
    (function(){
        window.addEventListener("load", inicializarEventos, false);
        function inicializarEventos(){
          tr = document.getElementsByClassName("link_pointer");
            for(var i =0; i<tr.length;i++)
              tr[i].addEventListener("click", redirect, false);
        }
        function redirect(e){
          elemento = e.target;
          if(elemento.className.indexOf('delete_button') == -1)
           {
            console.log(e.target)
            console.log(elemento.parentNode.getAttribute('data-href'));
              window.location = elemento.parentNode.getAttribute('data-href');
              
            }
          console.log(elemento);
        }
      }())
</script>
@endsection
@section('scripts')
{!! Html::script('/js/filtrar_por_nombre.js') !!}
{!! Html::script('/js/checkbox.js') !!}
{!! Html::script('/js/validaciones.js') !!}
{!! Html::script('/js/reset_inputs.js') !!}
{!! Html::script('/js/validacion_ajax_request_gestion.js') !!}
@endsection

