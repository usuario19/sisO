@extends('plantillas.main')

@section('title')
    SisO - Lista de Disciplinas
@endsection

@section('submenu')
@endsection

@section('content')
<div class="form-row">
@include('plantillas.menus.menu_gestion')

<div class="margin_top col-md-9">
    <div class="">
      <div class="card-">
        <div class="card-">
            <table class="table table-sm table-bordered" style="margin: 0%">
                <thead>
                    <th>
                        <div class=" container col-md-12 text-center" style="padding: 10px 0px">
                            <h4 class="lista_sub">CLASIFICACION</h4>
                        </div>
                    </th>
                </thead>
                <tbody>
                <tr> 
                <td>
                <div style="float: left;" class="form-group col-md-12">
                    {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                </div> </td>
                
                </tr>
            </tbody>
        </table>
        </div>
        <div class="card-">
          <div class="table-responsive-xl">
              <table class="table table-condensed">
                  <thead>
                    <th width="50px">ID</th>
                    <th width="100px">Logo</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>SubCategoria</th>
                    <th>Descripcion</th>
             
                  </thead>
                  <tbody id="datos">
                    @foreach($disciplinas as $disciplina)
                    
                        <tr id="fila.{{ $disciplina->id_disc }}" onMouseOver="ResaltarFila('fila.{{ $disciplina->id_disc }}');" onMouseOut="RestablecerFila('fila.{{ $disciplina->id_disc}}')" onClick="CrearEnlace('{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}');" style="cursor: pointer">
                        <td class="text-center">{{ $disciplina->id_disc}}</td>
                        <td class="text-center"><img class="img-thumbnail" src="/storage/foto_disc/{{ $disciplina->foto_disc }}" alt="" height=" 40px" width="40px"></td>
                        <td>{{ $disciplina->nombre_disc}}</td>
                        <td>{{$disciplina->nombre_categoria($disciplina->categoria)}}</td>
                        <td>{{$disciplina->nombre_subcateg($disciplina->sub_categoria)}}</td>
                        <td>{{ $disciplina->descripcion_disc}}</td>           
                      </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
        </div>
      </div>
</div>
</div>
</div>

@endsection
@section('scripts')
  {!! Html::script('/js/filas.js') !!}
  {!! Html::script('/js/filtrar_por_nombre.js') !!}
@endsection

