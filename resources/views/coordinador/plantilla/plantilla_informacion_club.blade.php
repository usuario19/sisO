@extends('plantillas.main')

@section('title')
    SisO - Club
@endsection
  
@section('content')
@if($club)
<div class="container col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('coordinador.index')}}">Clubs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $club->nombre_club }}</li>
            </ol>
        </nav>
</div>



<div class="container">
        {{-- <div class="table-responsive"> --}}
    

                <div class="row">
                        <div class=" container">
                            <div class="card">
                                <div class="card-header" style="padding: 0%">
                                        <div class="container text-center" style="padding: 15px 0px; margin: auto; min-height: 50px; background: white  ; color: ">
                                                <h5 {{-- class="display-4" --}} style="margin: AUTO">{{ strtoupper($club->nombre_club)}}</h5>
                                        </div>
                                </div>
                            <div class="card-body" style="padding: 0%">
                            <div id="contenedor_info"  {{--  class="form-group col-md-12"  --}} class="text-center">
            
                                <div class="text-center" {{--  style="position:relative"  --}}>
                                    
                                        <div id="contenedor_club">
                                            <img id="imgOrigen" class="rounded mx-auto d-block img-thumbnail" src="/storage/logos/{{ $club->logo }}" alt="" height=" 150px" width="150px">
                
                                            <div id="divtexto">
                                                <a id="btnCancelar" class="btn btn-outline-dark button noVista">
                                                    <span class="btn_hover ">
                                                        <i id="btnCancelar" class="material-icons float-left" style="color:white">clear</i>
                                                        
                                                    </span>
                                                </a>
                                                <a id="btnUpdate" class="btn btn-outline-dark button noVista">
                                                    <span class="btn_hover ">
                                                        <i id="btnUpdate" class="material-icons float-left" style="color:white">loop</i>
                                                    </span>
                                                </a>
                                                <a id="texto" class="btn btn-dark button vista">
                                                <span class="btn_hover ">
                                                    <i id="texto" class="material-icons float-left" style="color:white">edit</i>
                                                </span>
                                                </a>
                                            </div>
                                        </div>
                                </div> 
                               
                                <div class="form-row errorLogin">
                                
                                    <h6 style="text-align: center" id="error_foto">{{ $errors->has('logo') ? $errors->first('logo'):'' }}</h6>
                                
                                </div>
            
                              
                            </div>
                        </div>
                    </div>
                  </div>
                          {{--  </td>  --}}
                          {!! Form::open(['route'=>['coordinador.updateFotoClub'],'method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true]) !!}
            
                          <div class="form-row">
                                      <div class="{{ $errors->has('foto_admin') ? 'siError':'' }}">                            
                                        <div id="div_file" style="display: none;">
                                          {!! Form::text('id_club',$club->id_club, []) !!}
                                          {!! Form::file('logo', ['class'=>'upload','id'=>'input']) !!}
                                          <div style="display: none">
                                            {!! Form::submit('Actualizar foto', ['class'=>'btn btn-primary btn-block', 'id'=>'buttonUpdate']) !!}
                                          </div>
                                        </div>                             
                                      </div>
                          </div>
                          
                      {!! Form::close() !!}
                     {{--   </tr>
                 
                  </tbody>
                </table>  --}}
                        
    @yield('content_info')
                    
    </div>
@endif
@endsection
