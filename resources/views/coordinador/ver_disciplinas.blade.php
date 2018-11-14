@extends('coordinador.plantilla.plantilla_gestiones')

@section('content_info')
    <div class="card">
        <div class="card-header" style="padding: 0%">
            
                <nav class="navbar navbar-expand-md table-bordered menu">
                  <ul class="navbar-nav btn-block">
                    <li class="nav-item link col-md-3" style="padding: 0%">
                      <a class="nav-link link col-md-12 " href={{ route('disciplina.ver_disciplinas',[$datos->first()->id_club,$datos->first()->id_gestion]) }}>HABILITAR JUGADORES <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item link col-md-3" style="padding: 0%">
                        <a class="nav-link link active col-md-12" href={{ route('disciplina.ver_disciplinas_inscritas',[$datos->first()->id_club,$datos->first()->id_gestion]) }}>SELECCIONES</a>
                      </li>
                      
                      
                  </ul>
              
                </nav>
        </div>
        <div class="card-body">
            <div class="container col-lg-10 table-responsive-md">
                <table class="table  table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th colspan="2">Disciplina</th>
                        <th>categoria</th>
                        <th>Reglamento</th>
                        <th>Descripcion</th>
                        <th colspan="2"></th>
      
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $i=1;
                      @endphp
                      @foreach($disciplinas as $disc)
                        <tr>
                          <td>{{ $i }}</td>
                          <td><img class="rounded mx-auto d-block" src="/storage/foto_disc/{{ $disc->disciplina->foto_disc }}" alt="" height="30" width="30"></td>
                          <td>{{ strtoupper($disc->disciplina->nombre_disc)}}</td>
                          <td>@if($disc->disciplina->categoria == 1)
                                {{ 'Mujeres'}}
                              @elseif($disc->disciplina->categoria == 2)
                                {{ 'Hombres' }}
                              @else
                                {{ 'Mixto' }}
                              @endif
                          </td>
                          <td><a href="storage/archivos/{{ $disc->disciplina->reglamento_disc }}">
                            <div class="button-div" style="">
                                <i class="material-icons float-left">vertical_align_bottom</i>
                                <span class="letter-size">Descargar</span>
                            </div>
                          </td>
                            <td>{{ $disc->disciplina->descripcion_disc}}</td>
                          
                          {{-- <td>
                            <a href="{{ route('disciplina.eliminar',$disc->id_club_part) }}"  class="delete_button" data-toggle="modal" data-target="#Eliminar{{ $disc->id_club_part}}" >
                              <i title="Eliminar" class="material-icons delete_button button_redirect">
                                delete
                             </i>
                            </a>
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
                          </td> --}}
              
                          <td class="text-center" style="width: 50px"><a href="{{ route('seleccion.create_ajax', $disc->id_club_part) }}" title="Crear Seleccion" class="btn btn-light">
                              <div class="button-div" style="width: 25px">
                                  <i class="material-icons float-left">edit</i>
                                 {{--   <span class="letter-size">Crear Seleccion</span>  --}}
                              </div>
                          </a></td>
                          {{--  <td class="text-center" style="width: 50px"><a href="{{ route('seleccion.create_', $disc->id_club_part) }}" title="Ver Seleccion" class="btn btn-light">
                              <div class="button-div" style="width: 25px">
                                  <i class="material-icons float-left">remove_red_eye</i>
                              </div>
                          </a></td>  --}}
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

@endsection