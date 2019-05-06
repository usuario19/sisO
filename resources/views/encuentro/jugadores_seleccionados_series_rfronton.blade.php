@extends('plantillas.main') 
@section('title') SisO - Conformacion de equipos Futbol
@endsection
 
@section('content')
<div class="form-row">
  @include('plantillas.menus.menu_gestion')

  <div class="margin_top col-md-9">
    <div class="">
      <div class="card-">
        @include('encuentro.modal_agregar_jugador')
        @include('encuentro.modal_agregar_jugador2')
        @include('encuentro.modal_reg_participacion_jugador')
        @include('encuentro.modal_agregar_resultado_raquet_fronton')
        @include('encuentro.modal_ver_res_raqueta_fronton')
        <div class="container">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
              <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $fase->nombre_fase }}</li>
              <li class="breadcrumb-item"><a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}">Grupos</a></li>
              <li class="breadcrumb-item active" value="{{ $grupo->id_grupo }}" aria-current="page">{{ $grupo->nombre_grupo }}</li>
              <li class="breadcrumb-item"><a href="{{ route('grupo.encuentros_grupo_equipo',[$grupo->id_grupo,$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Encuentros</a></li>
              <li class="breadcrumb-item active" value="{{ $encuentro->id_encuentro }}" aria-current="page">{{ $encuentro->id_encuentro }}</li>
            </ol>
          </nav>
        </div>
        <div class="container">
          <div class="">
            <div class="form-row col-md-12 margin_none">

              <div class="form-group col-md-6">
                <h4 class="lista" style="font-size:20px">Conformacion de equipos</h4>
              </div>
              <div class="form-group col-md-3">
                <button type="button" onclick="VerResultadoSet({{ $encuentro->id_encuentro }});" class="btn btn-success btn-block" data-toggle="modal" data-target="#modalVerResultadoSet">
                  <div class="button-div" style="width: 100px">
                      <i class="material-icons float-left" style="font-size: 22px">done</i>
                      <span class="letter-size">resultado</span>
                    </div>
                </button> 
              </div>
              <div class="form-group col-md-3">
                <button id="button_calc_set" onclick="RegistrarResultadoSet({{ $encuentro->id_encuentro }});" type="button_add" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modalResultadoSet">
                  <div class="button-div" style="width: 100px">
                    <i class="material-icons float-left" style="font-size: 22px">edit</i>
                    <span class="letter-size">resultado</span>
                  </div>
               </button>
              </div>
            </div>
            <div class="form-row col-md-12 margin_none">
              <div class="form-group col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="form-row col-md-12">
                      <div class="form-group col-md-10" style="height:76px">
                        <h4 class="lista_sub">{{ $club1->nombre_club }}</h4>
                      </div>
                      <div class="form-group col-md-2">
                        <a href=" " class="button_delete" data-toggle="modal" data-target="#modalAgregarJugador1">
                          <i title="Agregar jugadores" class="material-icons delete_button" style="font-size: 35px">group_add</i>
                        </a>
                      </div>
                    </div>
                    <div class="table-responsive-xl">
                      <table class="table mi_tabla text-center table-sm table-hover table-bordered">
                        <thead>
                          <th width="30">ID</th>
                          <th>Jugador</th>
                          <th width="30" title="Jugador destacado" style="cursor: context-menu;">J.D.</th>
                          <th width="30" title="Faltas" style="cursor: context-menu;">F.</th>
                          <th width="30"></th>
                        </thead>
                        <tbody>
                          @foreach($jug_hab1 as $jugadores)
                          <tr>
                            <td>{{ $jugadores->id_jugador }}</td>
                            <td>
                              <img class="img-thumbnail" src="/storage/fotos/{{ $jugadores->foto_jugador}}" alt="" height=" 50px" width="50px">                              
                              {{ $jugadores->nombre_jugador.' '.$jugadores->apellidos_jugador }}
                            </td>
                            <td style="text-align:center;">
                                @if ($jugadores->posicion == 1)
                                    <i class="material-icons delete_button button_redirect">
                                        star_border
                                    </i>
                                @endif
                            </td>
                            <td style="text-align:center;">{{ $jugadores->faltas }}</td>
                            <td>
                              <a href=" " onclick="reg_puntos_jugador({{ $jugadores->id_jugador }});" class="button_delete" data-toggle="modal" data-target="#modalRegGol">
                                <i title="Registrar resultados" class="material-icons delete_button button_redirect">
                                    control_point
                                </i>
                              </a>
                              <a href="{{ route('encuentro.eliminar_jugador_encuentro_set',[$encuentro->id_encuentro,$jugadores->id_jugador]) }}">
                                <i title="Eliminar" class="material-icons delete_button">
                                  delete
                                </i>
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
              <div class="form-group col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="form-row col-md-12">
                      <div class="form-group col-md-10" style="height:76px">
                        <h4 class="lista_sub">{{ $club2->nombre_club }}</h4>
                      </div>
                      <div class="form-group col-md-2">
                        <a href=" " class="button_delete" data-toggle="modal" data-target="#modalAgregarJugador2">
                            <i title="Agregar jugadores" class="material-icons delete_button" style="font-size: 35px">group_add</i>
                        </a>
                      </div>
                    </div>
                    <div class="table-responsive-xl">
                      <table class="table mi_tabla table-sm table-hover text-center table-bordered">
                        <thead>
                          <th width="30">ID</th>
                          <th>Jugador</th>
                          <th width="30" title="Jugador destacado" style="cursor: context-menu;">J.D.</th>
                          <th width="30" title="Faltas" style="cursor: context-menu;">F.</th>
                          <th width="30"></th>
                        </thead>
                        <tbody>
                          @foreach($jug_hab2 as $jugadores)
                          <tr>
                            <td>{{ $jugadores->id_jugador }}</td>
                            <td>
                              <img class="img-thumbnail" src="/storage/fotos/{{ $jugadores->foto_jugador}}" alt="" height=" 50px" width="50px">                              
                              {{ $jugadores->nombre_jugador.' '.$jugadores->apellidos_jugador }}
                            </td>
                            <td style="text-align:center;">
                                @if ($jugadores->posicion == 1)
                                    <i class="material-icons delete_button button_redirect">
                                        star_border
                                    </i>
                                @endif
                            </td>
                            <td style="text-align:center;">{{ $jugadores->faltas }}</td>
                            <td>
                              <a href=" " onclick="reg_puntos_jugador({{ $jugadores->id_jugador }});" class="button_delete" data-toggle="modal" data-target="#modalRegGol">
                                <i title="Registrar resultados" class="material-icons delete_button button_redirect">
                                    control_point
                                </i>
                              </a>
                              <a href="{{ route('encuentro.eliminar_jugador_encuentro_set',[$encuentro->id_encuentro ,$jugadores->id_jugador]) }}">
                                <i title="Eliminar" class="material-icons delete_button">
                                  delete
                                </i>
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
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
 
@section('scripts') 
{!! Html::script('/js/checkbox.js')!!}
{!! Html::script('/js/calcular_sets.js')!!}
@endsection































{{-- {!! Form::open(['route'=>'encuentro.reg_resultado_basket','method' => 'POST']) !!}
<!-- Modal -->
<div class="modal fade" id="modalResultadoBasket" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display: flex; align-items: center;">
                <img class="mr-1 img_tb_info" src="/storage/logos/basket.png" alt="">
                <span class="modal-title" id="exampleModalCenterTitle">Registar resultados de {{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) .":"}}</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    @if ($fase->fase_tipos->first()->tipos->nombre_tipo == 'eliminacion')
                    <div class="form-row col-md-12">
                        <div class="col-12 margin_top">
                            Seleccione las siguientes opciones en caso de que el partido tenga tiempo extra y/o penales:
                        </div>
                        <div class="margin_top col-4">
                            <input type="checkbox" name="hab_te" id="t-extra" class="habilitar">
                            <label for="t-extra">Registrar goles tiempo extra</label>
                        </div>
                        <div class="margin_top col-3">
                            <input type="checkbox" name="hab_p" id="goles_penales" class="habilitar">
                            <label for="goles_penales">Registrar penales</label>
                        </div>
                    </div>
                    @endif
                    <div style="display: none">
                        {!! Form::text('id_disc',$disciplina->id_disc, []) !!} 
                        {!! Form::text('id_enc',$encuentro->id_encuentro, []) !!} 
                        {!! Form::text('id_gestion',$gestion->id_gestion, []) !!} 
                        {!! Form::text('id_fase',$fase->id_fase, []) !!}
                    </div>
                    <div class="form-row col-md-12 margin_none">
                        <div class="form-group col-md-6">
                            <div class="card">
                                <div style="display: none">
                                    {!! Form::text('id_encuentro1', null, ['id'=>'id_encuentro1']) !!} 
                                    {!! Form::text('id_encuentro_club_part1',null, ['id'=>'id_encuentro_club_part1'])
                                    !!}
                                </div>
                                <div class="margin_top col-md-12">
                                    {!! Form::label('equipo', 'Equipo 1', []) !!} 
                                    {!! Form::text('equipo1',$club1->nombre_club, ['id'=>'nombre_club1','class'=>'form-control','readonly'=>'true'])
                                    !!}
                                </div>
                                <div style="display: none">
                                    {!! Form::text('id_club1',$club1->id_club, ['id'=>'id_club1','class'=>'form-control','readonly'=>'true']) !!}
                                </div>
                                <div class="margin_top col-md-12">
                                    {!! Form::label('puntos_b1', 'Total puntos partido', []) !!}
                                    {!! Form::text('puntos_b1', null, ['id'=>'puntos_b1','class'=>'form-control']) !!}
                                </div>
                                @if ($fase->fase_tipos->first()->tipos->nombre_tipo == 'eliminacion')
                                    <div class="margin_top col-md-12 t-extra" style="display:none">
                                        {!! Form::label('puntos_extras1', 'Goles tiempo extra', []) !!} 
                                        {!! Form::text('puntos_extras1', null, ['id'=>'puntos_extras1','class'=>'form-group form-control']) !!}
                                    </div>
                                @endif
                                <div class="col-md-12">
                                    {!! Form::label('punto', 'Puntos', []) !!}
                                    <select name="punto1" id="puntos1" class="form-control">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select> 
                                </div>

                                <div class="margin_top col-md-12">
                                    {!! Form::label('observacion', 'Observacion', []) !!} 
                                    {!! Form::textarea('observacion1', null, ['id'=>'observacion1','class'=>'form-control','rows'=>'2'])
                                    !!}
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="card">
                                <div style="display: none">
                                    {!! Form::text('id_encuentro2',null,['id'=>'id_encuentro2']) !!} {!! Form::text('id_encuentro_club_part2', null, ['id'=>'id_encuentro_club_part2'])
                                    !!}
                                </div>
                                <div class="margin_top col-md-12">
                                    {!! Form::label('equipo', 'Equipo 2', []) !!} {!! Form::text('equipo2', $club2->nombre_club, ['id'=>'nombre_club2','class'=>'form-control','readonly'=>'true'])
                                    !!}
                                </div>
                                <div style="display: none">
                                    {!! Form::text('id_club2', $club2->id_club, ['id'=>'id_club2','class'=>'form-control','readonly'=>'true']) !!}
                                </div>
                                <div class="margin_top col-md-12">
                                    {!! Form::label('puntos_b2', 'Total puntos partido', []) !!} 
                                    {!! Form::text('puntos_b2', null, ['id'=>'puntos_b2','class'=>'form-control'])
                                    !!}
                                </div>
                                @if ($fase->fase_tipos->first()->tipos->nombre_tipo == 'eliminacion')
                                <div class="margin_top col-md-12 t-extra" style="display:none">
                                        {!! Form::label('puntos_extras2', 'Goles tiempo extra', []) !!} 
                                        {!! Form::text('puntos_extras2', null, ['id'=>'puntos_extras2','class'=>'form-group form-control']) !!}
                                </div>
                                @endif
                                <div class="col-md-12">
                                    {!! Form::label('punto2', 'Puntos', []) !!}
                                    <select name="punto2" id="puntos2" class="form-control">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select> 
                                </div>

                                <div class="margin_top col-md-12">
                                    {!! Form::label('observacion2', 'Observacion', []) !!} 
                                    {!! Form::textarea('observacion2', null, ['id'=>'observacion2','class'=>'form-control','rows'=>'2'])
                                    !!}
                                </div> 
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-row col-md-12">
                    <div class="form-group col-md-6">
                        {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn_aceptar']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
<script>
    var RegistrarResultadoBasket = function(id_encuentro) {
      var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_basket_ajax";
      $.get(route, function(data) {
          console.log(data);
          var i = 1;
              $("#puntos1").val(data.puntos1);
              $("#puntos2").val(data.puntos2);
              $("#puntos_b1").val(data.club1);
              $("#puntos_b2").val(data.club2);
              $("#puntos_extras1").val(data.puntos_extras1);
              $("#puntos_extras2").val(data.puntos_extras2);
              $("#observacion1").val(data.observacion1);
              $("#observacion2").val(data.observacion2);
              $("#id_encuentro_club_part1").val(data.id_encuentro_club_part1);
              $("#id_encuentro_club_part2").val(data.id_encuentro_club_part2);
      });
  };
</script> --}}