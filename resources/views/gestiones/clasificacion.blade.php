@extends('plantillas.main')

@section('title')
    SisO - Lista de Disciplinas
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="container">
   
    <div class="card">
        <div class="card-header">
            <table class="table table-sm table-bordered" style="margin: 0%">
                <thead>
                    <th>
                        <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                            <h4 class="" style="font-size: 18px">DISICPLINAS PARTICIPANTES</h4></td>
                        </div>
                    </th>
                </thead>
                <tbody>
                <tr> 
                <td>
                <div style="float: left;" class="form-group col-md-12">
                    {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                </div>
                
                </tr>
            </tbody>
        </table>
        </div>
        <div class="card-body">
          <div class="table-responsive-xl">
              <table class="table table-condensed">
                  <thead>
                    <th width="50px">ID</th>
                    <th width="100px">Logo</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Descripcion</th>
             
                  </thead>
                  <tbody id="datos">
                    @foreach($disciplinas as $disciplina)
                    
                        <tr id="fila.{{ $disciplina->id_disc }}" onMouseOver="ResaltarFila('fila.{{ $disciplina->id_disc }}');" onMouseOut="RestablecerFila('fila.{{ $disciplina->id_disc}}')" onClick="CrearEnlace('{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}');" style="cursor: pointer">
                        <td>{{ $disciplina->id_disc}}</td>
                        <td><img class="img-thumbnail" src="/storage/foto_disc/{{ $disciplina->foto_disc }}" alt="" height=" 40px" width="40px"></td>
                        <td>{{ $disciplina->nombre_disc}}</td>
                        <td>{{$disciplina->nombre_categoria($disciplina->categoria)}}</td>
                        <td>{{ $disciplina->descripcion_disc}}</td>           
                      </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
            
        </div>
      </div>
  
 {{ $disciplinas->links() }}
</div>

@endsection
@section('scripts')
  {!! Html::script('/js/filas.js') !!}
  {!! Html::script('/js/filtrar_por_nombre.js') !!}
@endsection

