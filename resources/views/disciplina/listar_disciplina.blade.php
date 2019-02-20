@extends('plantillas.main')

@section('title')
    SisO - Lista de Disciplinas
@endsection

@section('content')

<div class="container">
        @if(Auth::check() && Auth::user()->tipo == 'Administrador')
        @include('disciplina.modal_editar_disc')
    @endif
    <div class="form-row">
        <div class="form-group col-md-12">
            <table class="table table-sm table-bordered">
                <thead>
                    <th>
                        <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                            <h4 class="">DISCIPLINAS</h4>
                        </div>
                    </th>
                    </thead>
                    <tbody>
                        <tr> 
                            @if(Auth::check() && Auth::user()->tipo == 'Administrador')
                            <td>
                                <div style="float: left;" class="form-group col-md-10">
                                {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                                </div>
                                <div style="float: left;" class="form-group col-md-2">
                                                    @include('disciplina.modal_agregar_disc')
                                </div>
                            </td>
                            @else
                                <td>
                                            <div style="float: left;" class="form-group col-md-12">
                                                {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                                            </div>
                                        </td>
                             @endif
                                     
                        </tr>
                    </tbody>
               </table>
                              
            </div>
        </div>
            
                <div class="card container">
            
                     <div class="card-body" style="padding: 10px">
                                    
                        <div class="container table-responsive-xl">
                            <table class="table table-condensed">
                                <thead>
                                <th width="50px">ID</th>
                                <th width="100px">Logo</th>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Tipo</th>
                                <th>Descripcion</th>
                                <th>Reglamento</th>
                                
                                @if(Auth::check() && Auth::user()->tipo == 'Administrador')
                                    <th>Acciones</th>
                                    @endif  
                                </thead>
                                <tbody id="datos">
                                @php
                                    $i=1;
                                @endphp
                    
                                @foreach($disciplinas as $disciplina)
                                
                                    <tr>
                                    <td>{{$i}}{{-- {{ $disciplina->id_disc}} --}}</td>
                    
                                    <td><img class="rounded mx-auto d-block" src="/storage/foto_disc/{{ $disciplina->foto_disc }}" alt="" height=" 50px" width="50px"></td>
                                    <td>{{ $disciplina->nombre_disc}}</td>
                                    <td>{{ $disciplina->nombre_categoria($disciplina->categoria) }}</td>
                                    <td>{{ $disciplina->nombre_tipo($disciplina->tipo) }}</td>
                                    <td>{{ $disciplina->descripcion_disc}}</td>
                                    <td><a href="storage/archivos/{{ $disciplina->reglamento_disc }}">
                                        
                                            <div class="button-div" style="">
                                                <i class="material-icons float-left">vertical_align_bottom</i>
                                                <span class="letter-size">Descargar</span>
                                            </div></td>
                                    @if(Auth::check() && Auth::user()->tipo == 'Administrador')
                                        <td><a href="" onclick="MostrarDisc({{ $disciplina->id_disc }});"  data-toggle="modal" data-target="#modalEditDisc"><i title="Editar" class="material-icons delete_button button_redirect">edit</i></a></td>
                    
                                        <td><a href="{{ route('disciplina.destroy',$disciplina->id_disc) }}" onclick = "return Alert::info('Esta seguro de eliminar la disciplina,'jej')" ><i title="Eliminar" class="material-icons delete_button">delete </i></a></td>
                                    @endif   
                                    
                    
                                    </tr>
                                    @php
                                    $i++;
                                    @endphp
                                @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                   
    </div>
</div>

@endsection
@section('scripts')
<!-- @if(Auth::check() && Auth::user()->tipo == 'Administrador') -->

<!-- @endif

    {!! Html::script('/js/filtrar_por_nombre.js') !!} -->
@endsection
<script> 
    var MostrarDisc = function(id){
      var route = "{{ url('disciplina') }}/"+id+"/edit";
      $.get(route, function(data){
        $("#edit_id_disc").val(data.id_disc);
        $("#edit_nombre_disc").val(data.nombre_disc);
        //$("#edit_administrador").val(data.id_administrador);
        $("#edit_categoria").val(data.categoria);
        $("#edit_tipo").val(data.tipo);
        var url = '/storage/foto_disc/'+data.foto_disc
        var file = $.get(url);
            $('#imgOrigenEditDisc').attr('src', url);
    
        //var urlReglamento = '/storage/archivos/'+data.reglamento_disc
        //var reglamento = $.get(urlReglamento);
        //    $('#edit_reglamento_disc').attr('src', urlReglamento);
        $("#edit_descripcion_disc").val(data.descripcion_disc);
      });
    }
</script>
