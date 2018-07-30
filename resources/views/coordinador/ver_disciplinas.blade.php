@extends('plantillas.main')

@section('title')
    SisO - Disciplinas
@endsection

@section('content')
<table class="table table-sm table-container">
      <thead> 
        <tr>
          @foreach($datos as $dato)
            <th colspan="2">
              <img src="/storage/logos/{{ $dato->logo }}" alt="" width="110px" height="100px">
            </th>
            <th colspan="9">
              <h3 class="display-4">{{ $dato->nombre_club }}</h3>
            </th>
          
        </tr>
        <tr>
          <th colspan="11">
            <h3 class="display-4">{{ $dato->nombre_gestion }}</h3>
          </th>
        </tr>
       @endforeach
        <tr class="table-primary">
          <th width="20px">ID</th>
          <th width="100px">Foto</th>
          <th>Disciplina</th>
          <th>Categoria</th>
          <th colspan="2">Acciones</th>
        </tr>
        
      </thead>
      <tbody>
        @foreach($disciplinas as $disc)
          <tr>
            <td>{{ $disc->id_club_part}}</td>
            <td><img class="rounded mx-auto d-block" src="/storage/foto_disc/{{ $disc->disciplina->foto_disc }}" alt="" height=" 100px" width="100px"></td>
            <td>{{ $disc->disciplina->nombre_disc}}</td>
            <td>@if($disc->disciplina->categoria == 1)
                  {{ 'Mujeres'}}
                @elseif($disc->disciplina->categoria == 2)
                  {{ 'Varones' }}
                @else
                  {{ 'Mixto' }}
                @endif
            </td>
            <td>
              <a href="{{ route('disciplina.eliminar',$disc->id_club_part) }}"  class="btn btn-danger" data-toggle="modal" data-target="#Eliminar{{ $disc->id_club_part}}" >Eliminar</a>
              <!-- Modal -->
              <div class="modal fade" id="Eliminar{{ $disc->id_club_part}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">SisO:</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      Esta seguro de querer eliminar la participacion en esta disciplina?
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                      <a href="{{ route('disciplina.eliminar',$disc->id_club_part) }}" class="btn btn-primary">Eliminar</a>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td><a href="{{ route('seleccion.create', $disc->id_club_part) }}" class="btn btn-success">Crear Seleccion</a></td>
          </tr>
        @endforeach
       
      </tbody>
  </table>
@endsection