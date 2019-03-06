@extends('plantillas.main')

@section('title')
    SisO - Lista de Disciplinas
@endsection

@section('content')
<div class="container">
    <div class="card">
        @if(Auth::check() && Auth::user()->tipo == 'Administrador')
            @include('disciplina.modal_editar_disc')
        @endif
        <div class="card-header">
        <div class="table-responsive-xl">
            <table class="table table-sm table-bordered">
                <thead>
                    <th>
                        <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                            <h4 class="title-principal">LISTA DE DISCIPLINAS</h4>
                        </div>
                    </th>
                </thead>
                <tbody>
                        <tr> 
                            @if(Auth::check() && Auth::user()->tipo == 'Administrador')
                            <td>
                                <div class="form-row col-md-12">
                                    <div class="form-group col-xl-9">
                                        {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                                    </div>
                                    <div class="form-group col-xl-3">
                                        @include('disciplina.modal_agregar_disc')
                                    </div>
                                </div>
                            </td>
                            @else
                                <td>
                                    <div class="form-group col-md-12">
                                        {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                                    </div>
                                </td>
                             @endif
                                     
                        </tr>
                    </tbody>
            </table>              
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive-xl">
            <table class="mi_tabla table table-sm table-bordered">
                <thead>
                <th scope="col" width="50px">NO</th>
                <th scope="col" width="100px">Logo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tipo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Reglamento</th>
                
                @if(Auth::check() && Auth::user()->tipo == 'Administrador')
                    <th scope="col" colspan="2">Acciones</th>
                    @endif  
                </thead>
                <tbody id="datos">
                @php($i=1)
                @foreach($disciplinas as $disciplina)
                    <tr>
                    <th scope="row">{{$i}}</th>


                    <td class="text-center"><img class="rounded-circle mx-auto d-block" src="/storage/foto_disc/{{ $disciplina->foto_disc }}" alt="" height="70px" width="70px"></td>
                    <td>{{ $disciplina->nombre_disc}}</td>
                    <td>{{ $disciplina->nombre_categoria($disciplina->categoria) }}</td>
                    <td>{{ $disciplina->nombre_tipo($disciplina->tipo) }}</td>
                    <td>
                        {{ $disciplina->descripcion_disc}}
                    </td>
                    <td>
                        @if ($disciplina->reglamento_disc)
                            <a href="storage/archivos/{{ $disciplina->reglamento_disc }}">
                        
                            <div class="button-div" style="">
                                <i class="material-icons float-left">vertical_align_bottom</i>
                                <span class="letter-size">Descargar</span>
                            </div> 
                        @else
                            
                        @endif
                        
                    </td>
                    @if(Auth::check() && Auth::user()->tipo == 'Administrador')
                        <td><a href="" onclick="MostrarDisc({{ $disciplina->id_disc }});"  data-toggle="modal" data-target="#modalEditDisc">
                            <i title="Editar" class="material-icons delete_button button_redirect">edit</i>
                        </a>
                    </td>

                        <td><a href="{{ route('disciplina.destroy',$disciplina->id_disc) }}" onclick = "return Alert::info('Esta seguro de eliminar la disciplina,'jej')" ><i title="Eliminar" class="material-icons delete_button">delete </i></a></td>
                    @endif   

                    </tr>
                    @php($i++)
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
    {!! Html::script('/js/filtrar_por_nombre.js') !!}
    {!! Html::script('/js/vista_previa.js') !!}
    <script> 
        var MostrarDisc = function(id){
          var route = "{{ url('disciplina') }}/"+id+"/edit";
          $.get(route, function(data){
            $("#edit_id_disc").val(data.id_disc);
            $("#edit_nombre_disc").val(data.nombre_disc);
            //$("#edit_administrador").val(data.id_administrador);
            $("#edit_categoria").val(data.categoria);
            $("#edit_sub_categoria").val(data.sub_categoria);
            $("#edit_tipo").val(data.tipo);
            var url = '/storage/foto_disc/'+data.foto_disc
            var file = $.get(url);
                $('#imgOrigen2').attr('src', url);
        
            //var urlReglamento = '/storage/archivos/'+data.reglamento_disc
            //var reglamento = $.get(urlReglamento);
            //    $('#edit_reglamento_disc').attr('src', urlReglamento);
            $("#edit_descripcion_disc").val(data.descripcion_disc);
          });
        }
    </script>
@endsection

