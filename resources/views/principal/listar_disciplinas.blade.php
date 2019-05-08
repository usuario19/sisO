@extends('plantillas.main')
@section('title')
    SisO - Lista de disciplinas
@endsection

@section('content')
<div class="container">
<div class="card">


<div class="container"  style="background: #C40F31" >
    <div class="div-title-principal container text-center">
        <h1 class="title-principal">disciplinas</h1>
    </div>
</div>
<br>
  <div class="container">
    <div class="table-responsive-xl">
        <div class="col-md-12" style="border-block-end: solid 2px #D0D3D4">
            <table class="table table-borderless" style="margin: 0%">
                <thead>
                    <th class="lista_sub text-dark text-center">deportes colectivos</th>
                </thead>
            </table>
        </div>
        <br>
      <div class="col-md-12 mx-auto">
          <div class="form-row">
              @foreach($disciplinas->sortBy('nombre_disc') as $disciplina)
                @if ($disciplina->tipo == 0)
                    <div class="col-md-2">
                        <a class="title-span" href="{{ route('principal.disciplina_info',$disciplina->id_disc) }}">
                            <div class="text-center" style="margin: 20px">
                                <img class="rounded-circle mx-auto d-block" src="/storage/foto_disc/{{ $disciplina->foto_disc}}" alt="" width="100px" height="100px">
                                <br><span>{{ $disciplina->nombre_disc}}
                                    {{ $disciplina->nombre_categoria($disciplina->categoria)}}<br>
                                </span>
                                <span class="lista_sub text-dark" style="font-size:15px">
                                        {{ $disciplina->nombre_subcateg($disciplina->sub_categoria)}}
                                            
                                     </span> 
                                
                            </div>
                        </a>
                    </div>
                @endif
              
              @endforeach
          </div>
      </div>
  </div>
  <br>
  <div class="container">
        <div class="table-responsive-xl">
            <div class="col-md-12" style="border-block-end: solid 2px #D0D3D4">
                <table class="table table-borderless" style="margin: 0%">
                    <thead>
                        <th class="ista_sub text-dark text-center">deportes individuales</th>
                    </thead>
                </table>
            </div>
            <br>
          <div class="col-md-12 mx-auto">
              <div class="form-row">
                  @foreach($disciplinas->sortBy('nombre_disc') as $disciplina)
                    @if ($disciplina->tipo == 1)
                        <div class="col-md-2">
                            <a class="title-span" href="{{ route('principal.disciplina_info',$disciplina->id_disc) }}">
                                <div class="text-center" style="margin: 20px">
                                    <img class="rounded-circle mx-auto d-block" src="/storage/foto_disc/{{ $disciplina->foto_disc}}" alt="" width="100px" height="100px">
                                    <br><span>{{ $disciplina->nombre_disc}}
                                        {{ $disciplina->nombre_categoria($disciplina->categoria)}}<br></span>
                                       <span class="lista_sub text-dark" style="font-size:15px">
                                       {{ $disciplina->nombre_subcateg($disciplina->sub_categoria)}}
                                           
                                    </span> 
                                    
                                    
                                </div>
                            </a>
                        </div>
                    @endif
                  
                  @endforeach
              </div>
          </div>
      </div>
    </div>
</div>
</div>
</div>
@endsection

@section('scripts')

  {!! Html::script('/js/script.js') !!}
   {!! Html::script('/js/filtrar_por_nombre.js') !!}
  {!! Html::script('/js/vista_previa.js') !!}

@endsection

