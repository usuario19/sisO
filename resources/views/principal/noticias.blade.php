@extends('plantillas.main')

@section('title')
SisO - Lista de gestiones
@endsection
@section('content')


<div class="container mx-auto padd_none">
  <div class="container-fluid" style="background: #333333">
    <div class="div-title-principal container text-center" style="height: 80px">
      <h5 class="lista text-white">galeria</h5>
    </div>
  </div><br>

  <div class="col-md-12 mx-auto padd_none">
    <div class="card-">
      <h5 class="lista text-center" style="color:black">Federacion nacional de trabajadores universitarios</h5>
    </div>

    <div class="bd-example" >
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" >
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner overflow-hidden" style="max-height: 400px">
          <div class="carousel-item active">
            <img src="/storage/fotos/1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              
            </div>
          </div>
          <div class="carousel-item">
            <img src="/storage/fotos/2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              
            </div>
          </div>
          <div class="carousel-item">
            <img src="/storage/fotos/3.jpg" class="d-block  w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              
            </div>
          </div>
          <div class="carousel-item">
              <img src="/storage/fotos/4.jpg" class="d-block  w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
               
              </div>
            </div>
            <div class="carousel-item">
                <img src="/storage/fotos/5.jpg" class="d-block  w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  
                </div>
              </div>
              <div class="carousel-item">
                  <img src="/storage/fotos/6.jpg" class="d-block  w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    
                  </div>
                </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <div class="container">
      @foreach ($datos->groupBy('id_gestion') as $dato)
      <div class="reporte_g container col-md-12">
          <h4 class="lista text-uppercase text-dark">{{$dato->first()->gestion->nombre_gestion}}</h4>
      </div>
      <div class=" container col-md-12">
          <h4 class="lista_sub text-uppercase text-secondary">Eventos</h4>
      </div>
      <div class="col-md-12 mx-auto">
          <div class="form-row">
              @foreach($dato->where('id_disc',NULL)->groupBy('titulo') as $img1)
              <div class="col-md-4 img_galeria">
                      <a class="title-span" href="{{ route('centro.evento_informacion',[$img1->first()->titulo,$dato->first()->id_gestion]) }}">
                          <div class="text-center img_galeria" style="margin-top: 20px">
                              <img class="mx-auto d-block" src="/storage/fotos/{{ $img1->first()->foto}}" alt="" width="" height="200px">
                              <div class="col-md-12 bg-dark cubo">
                                  <span class="lista_sub text-white cubo" style="font-size:18px">{{$img1->first()->titulo}}</span><br>
                                  <span class="lista_sub text-secondary cubo" style="text-transform:; font-size: 18px">
                                      Ver mas
                                        <i class="material-icons" style="top:7px">
                                          apps
                                        </i>
                                    </span>
                              </div>
                              
                          </div>
                      </a>
                </div>
              @endforeach
          </div>
      </div>
      <div class="margin_top container col-md-12">
          <h4 class="lista_sub text-secondary">ENCUENTROS </h4>
      </div>
      <div class="col-md-12 mx-auto">
          <div class="form-row">
              @foreach($dato->where('id_disc',"!=",NULL)->groupBy('id_disc') as $img)
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" href="{{ route('centro.evento_info',[$img->first()->id_disc,$dato->first()->id_gestion]) }}">
                          <div class="text-center img_galeria" style="margin-top: 20px">
                              <img class="mx-auto d-block" src="/storage/fotos/{{ $img->first()->foto}}" alt="" width="" height="200px">
                              <div class="col-md-12 bg-dark cubo">
                                  <span class="lista_sub text-white" style="font-size: 18px">
                                      {{ $img->first()->disciplina->nombre_disc." ".$img->first()->disciplina->nombre_categoria($img->first()->disciplina->categoria)." ".$img->first()->disciplina->nombre_subcateg($img->first()->disciplina->sub_categoria)}}
                                    </span><br>
                                    <span class="lista_sub text-secondary" style="text-transform:; font-size: 18px">
                                      Ver mas
                                        <i class="material-icons" style="top:7px">
                                          apps
                                        </i>
                                    </span>
                              </div>
                              
                          </div>
                          
                      </a>
              </div>
              @endforeach
          </div>
      </div>
  </div>
      @endforeach

    </div>
  </div>
</div>

</div>
@include('sweetalert::cdn')
@include('vendor.sweetalert.view')
@endsection