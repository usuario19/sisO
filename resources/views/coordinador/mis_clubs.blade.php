@extends('plantillas.main')

@section('title')
    SisO - Mis Clubs
@endsection

@section('content')


	<div class="container">
    <div class="col-md-12 table-responsive-xl">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="id_club_jugadores">Mis clubs</label>
            </div>
            {!! Form::select('id_club', ['1'=>'club 1'],0, ['class'=>'custom-select','id'=>'id_club_jugadores']) !!}</td>
                
        </div>
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
                            <div class="">
                                <i class="material-icons float-left">settings</i>
                                <span class="letter-size">Configuracion</span>
                            </div>
                        </a>
                      </div>
                    </td>
                    <td style="width: 50%">
                      <div>
                        <a href="{{ route('coordinador.show', $club->id_club) }}" class="btn btn-outline-success">
                            <div class="">
                                <i class="material-icons float-left">group</i>
                                <span class="letter-size">ver jugadores</span>
                            </div>
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