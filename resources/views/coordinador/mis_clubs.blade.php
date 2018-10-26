@extends('plantillas.main')

@section('title')
    SisO - Mis Clubs
@endsection

@section('content')


	<div class="container">
    <div class="col-md-12 table-responsive-xl">
        <h1 style="font-size: 18px" class="display-3">Mis Clubs:</h1>
        <br>
      @foreach($mis_clubs as $club)
      <div class="col-12 table-responsive">
     

        <table class="table table-sm table-bordered">
          
              <thead>
                <th class="title-table-club" colspan="4">
                        <h4 class="display-5">{{ strtoupper($club->club->nombre_club)}}</h4>
                </th>
                <!--tr class="">
                  <!--th width="50px">ID</th>
                  <th width="200px">Logo</th>
                  <th width="200px">Informacion</th>
                  <th width="300px"></th>
                  <th class="bg-info" colspan="3"><h3 align="center" style="font-size: 40px;" class="display-3">{{ $club->club->nombre_club}}</h3></th>
                </tr-->
              </thead>
              <tbody>
                  <tr>
                    <!--td rowspan="4">{{ $club->id_club}}</td-->
                    <td colspan="2"><img class="rounded mx-auto d-block" src="/storage/logos/{{$club->club->logo}}" alt="" height=" 200px" width="200px">
                    </td>
                  </tr>

                  <tr>
                    <td style="width: 50%">
                      <div align="right">
                        <a href="{{ route('coordinador.informacion_club', $club->id_club) }}" class="btn btn-outline-warning"> 
                          <span class="btn_hover_del ">
                            <i class="fas fa-cog"></i>
                            <span  class="letter_size"> Configuración </span>
                          </span>
                        </a>
                      </div>
                    </td>
                    <td style="width: 50%">
                      <div>
                        <a href="{{ route('coordinador.show', $club->id_club) }}" class="btn btn-outline-success">
                            <span class="btn_hover_del ">
                                <i class="fas fa-users"></i>
                                <span  class="letter_size"> Ver jugadores </span>
                              </span>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                      <td><div align="right" class="display-6">Nombre del club:</div></td>
                      <td colspan="2">{{ $club->club->nombre_club}}</td>
                  </tr>
        
                  <tr>
                      <td><div align="right">Ciudad:</div></td>
                      <td colspan="2">{{ $club->club->ciudad}}</td>
                  </tr>
                  <tr>
                      <td><div align="right">Descripcion:</div></td>
                      <td colspan="2">{{ $club->club->descripcion_club}}</td>
                  </tr>
                
              </tbody>
        </table>
      </div>
        @endforeach
      
      </div>
  </div>
@endsection