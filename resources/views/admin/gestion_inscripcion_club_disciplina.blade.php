@extends('plantillas.main') 
@section('title') SisO - Lista de Disciplinas
@endsection
 
@section('submenu')
@endsection
 
@section('content')
<div class="form-row">
  @include('plantillas.menus.menu_gestion')

  <div class="margin_top col-md-9">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('gestion.disciplinas',$gestion->id_gestion) }}">Disciplinas habilitadas</a></li>
            <li class="breadcrumb-item active"{{--   value="{{ $encuentro->id_encuentro }} " --}} aria-current="page">{{  $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
          </ol>
        </nav>

    <div class="card">
      <div class="card-header">
        <table class="table table-sm table-borderless" style="margin: 0%">
          <thead>
            <th>
              <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                <h4 class="lista_sub">Clubs inscritos en la disciplina : {{$disciplina->nombre_disc." ".$disciplina->nombre_categoria($disciplina->categoria)}}</h4>
                </td>
              </div>
            </th>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="card-body padd_left_none padd_right_none">
        <div class="form-row col-md-12 margin_none">
          <div class="col-md-6">
            <div class="table-responsive-xl">
              
              {!! Form::open(['route'=>'gestion.inscripcion_club_disciplina','method' => 'POST','id'=>'','class'=>'']) !!}
              
              <table class="table mi_tabla table-sm table-bordered table-hover">
                <div style="display:none">
                    {!! Form::text('id_gest', $gestion->id_gestion, []) !!}
                    {!! Form::text('id_disc', $disciplina->id_disc, []) !!}
                </div>
                <thead class="bg-success" style="color:white">
                  <tr>
                    <th colspan="5" style="color:white">
                      Todos los clubs habilitados en la Gestion:
                    </th>
                  </tr>
                  <tr>
                    <th width="30" style="color:white">ID</th>
                    <th width="50" style="color:white">Logo</th>
                    <th style="color:white">Nombre</th>
                    <th style="color:white">CiudaD</th>
                    <th width="50">
                        {!! Form::checkbox('todo','todo', false, ['class'=>'check_all','id'=>"check_us1"]) !!}
                    </th>
                  </tr>
                </thead>
                <tbody>
                  {{--  inscritos en la gestion  --}}
                  {{--  {{dd($inscritos)}}  --}}
                @foreach ($inscripciones as $inscripcion)
                <tr>
                  <td>
                    {{$inscripcion->admin_club->club->id_club}}
                  </td>
                  <td>
                    <img class="img_foto" src="/storage/logos/{{$inscripcion->admin_club->club->logo}}" alt="">
                  </td>
                  <td>
                    {!! Form::label("check_us1".$inscripcion->admin_club->club->id_club , $inscripcion->admin_club->club->nombre_club , []) !!}
                  </td>
                  <td>
                    {{$inscripcion->admin_club->club->ciudad}}
                  </td>
                  <td class="text-center">
                      {!! Form::checkbox('id_clubs[]',$inscripcion->admin_club->club->id_club, false, ['class'=>'check_us1','id'=>"check_us1".$inscripcion->admin_club->club->id_club]) !!}
                  </td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="5">
                    <div class="container col-md-6">
                      <button class="button_spiner btn btn-block btn-success" type="button" disabled style="display:none">
                          <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                          Cargando...
                        </button>
                      {!! Form::submit('Habilitar', ['class'=>'btn btn-block btn_aceptar']) !!}
                    </div>
      
                  </td>
                </tr>
                </tbody>
              </table>
              
              {!! Form::close() !!}
              
            </div>
          </div>
          <div class="col-md-6">
            <div class="table-responsive-xl">
              {!! Form::open(['route'=>'gestion.eliminar_club_disciplina','method' => 'POST','id'=>'','class'=>'']) !!}
              <table class="table mi_tabla table-sm table-bordered table-hover">
                  <thead class="bg-warning">
                    <tr>
                      <th colspan="5">
                        Clubs habilitados en la disciplina:
                      </th>
                      </tr>
                      <tr>
                        <th width="30">ID</th>
                        <th width="100">Logo</th>
                        <th>Nombre</th>
                        <th>CiudaD</th>
                        <th width="50">
                            {!! Form::checkbox('todo','todo', false, ['class'=>'check_all','id'=>"check_us2"]) !!}
                        </th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($inscritos as $inscrito)
                      <tr>
                        <td>
                          {{$inscrito->id_club_part}}
                        </td>
                        <td>
                          <img class="img_foto" src="/storage/logos/{{$inscrito->club->logo}}" alt="">
                        </td>
                        <td>
                          {!! Form::label("check_us2".$inscrito->club->id_club , $inscrito->club->nombre_club , []) !!}
                        </td>
                        <td>
                          {{$inscrito->club->ciudad}}
                        </td>
                        <td class="text-center">
                            {!! Form::checkbox('id_club_parts[]',$inscrito->id_club_part, false, ['class'=>'check_us2','id'=>"check_us2".$inscrito->club->id_club]) !!}
                        </td>
                      </tr>
                      @endforeach
                      <tr>
                        <td colspan="5">
                          <div class="container col-md-6">
                            <button class="button_spiner btn btn-block btn-success" type="button" disabled style="display:none">
                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                Cargando...
                              </button>
                            {!! Form::submit('Deshabilitar', ['class'=>'btn btn-block btn-secondary btn_aceptar']) !!}
                          </div>
            
                        </td>
                      </tr>
                  </tbody>
              </table>
              {!! Form::close() !!}
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
{{--  {!! Html::script('/js/filtrar_por_nombre.js') !!} 
{!! Html::script('/js/validacion_ajax_disc_reg.js')!!}   --}}
{!! Html::script('/js/checkbox.js') !!}
@endsection