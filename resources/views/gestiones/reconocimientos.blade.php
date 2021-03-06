@extends('plantillas.main')

@section('title')
    SisO - Reconocmientos
@endsection

@section('submenu')
@endsection

@section('content')

@include('gestiones.modal_registrar_reconocimiento')
@include('gestiones.modal_registrar_reco_jugador')
<div class="form-row">
@include('plantillas.menus.menu_gestion')

<div class="margin_top col-md-9">
    <div class="">
      <div class="card-">
      <div class="card-">
          <table class="table table-sm table-bordered" style="margin: 0%">
              <thead>
                  <th>
                      <div class="container col-md-12" style="padding: 10px 0px">
                          <h4 class="lista_sub">RECONOCIMIENTOS</h4></td>
                      </div>
                  </th>
                  </thead>
              <tbody>
              <tr> 
                
                    @if(Auth::check() && Auth::user()->tipo == 'Administrador')
                    <td>
                        <div style="float: left;" class="form-group col-md-12">
                            {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                         </div>
                             {{--  <button type="button" class="btn   btn-primary" data-toggle="modal" data-target="#modal">Agregar</button></div>  --}}
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
      <div class="card-">
          <div class="table-responsive-xl">
              <table class="table table-condensed">
                  <thead>
                    <th width="50px">ID</th>
                    <th width="100px">Logo</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>SubCategoria</th>
                    <th colspan="3">Reconocmiento</th>
                  </thead>
                  <tbody id="datos">
            
                    @foreach($disciplinas as $disciplina)
                    
                      <tr>
                        <td class="text-center">{{ $disciplina->disciplina->id_disc}}</td>
            
                        <td class="text-center"><img class="img-thumbnail" src="/storage/foto_disc/{{ $disciplina->disciplina->foto_disc }}" alt="" height=" 40px" width="40px"></td>
                        <td>{{ $disciplina->disciplina->nombre_disc}}</td>
                        <td>{{ $disciplina->disciplina->nombre_categoria($disciplina->disciplina->categoria) }}</td>
                        <td>{{ $disciplina->disciplina->nombre_subcateg($disciplina->disciplina->sub_categoria) }}</td>
                         
                        <td class="text-center">
                                <a href=" " onclick="RegistrarGanadores({{$disciplina->disciplina->id_disc}});"  class="button_delete" data-toggle="modal" data-target="#modalGanadores">
                                        <i title="Club" class="material-icons delete_button button_redirect">
                                                star_border
                                        </i>
                                </a>
                        </td>
                        <td>
                            <a href=" " onclick="RegistrarGanadoresCompeticion({{$disciplina->disciplina->id_disc}});"  class="button_delete" data-toggle="modal" data-target="#modalGanadoresCompeticion">
                                <i title="Jugador" class="material-icons delete_button button_redirect">
                                        star_border
                                </i>
                        </a>
                        </td>
                                
                                <td>
                                    <a href="{{ route('gestion.mostrar_reconocimientos',[$gestion->id_gestion,$disciplina->disciplina->id_disc]) }}">
                                    <i title="Ganadores" class="material-icons delete_button">star</i>
                                </a>
                                </td>
                                
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
{!! Html::script('/js/filtrar_por_nombre.js') !!}
{!! Html::script('/js/checkbox.js') !!}
@endsection