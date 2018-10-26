@extends('plantillas.main')

@section('title')
    SisO - Lista de jugadores
@endsection

@section('content')
<h1  class="display-1" style="font-size: 16px">Lista de jugadores</h1>
<br>
  <div class="form-row">
    <table class="table table-borderless">
      <thead></thead>
      <tbody>
        <tr class="table-info">
          <td width="50px"><h1  class="display-1" style="font-size: 16px">Selecciona un club: </h1></td>
          <td width="350px">{!! Form::select('id_club', $clubs,0, ['class'=>'form-control','id'=>'id_club_jugadores']) !!}</td>
        </tr>
      </tbody>  
    </table>
  </div>
  <div id='contenido' class="table-responsive-xl">
    
  </div>
@endsection
@section('scripts')
  {!! Html::script('/js/cambiar_club.js') !!}
  @yield('scripts_add')
@endsection