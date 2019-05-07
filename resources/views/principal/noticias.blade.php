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
        <div class="carousel-inner overflow-hidden" style="height: 400px">
          <div class="carousel-item active">
            <img src="/storage/fotos/1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/storage/fotos/2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Primer partido</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/storage/fotos/3.jpg" class="d-block  w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
          </div>
          <div class="carousel-item">
              <img src="/storage/fotos/4.jpg" class="d-block  w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
              </div>
            </div>
            <div class="carousel-item">
                <img src="/storage/fotos/5.jpg" class="d-block  w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
              </div>
              <div class="carousel-item">
                  <img src="/storage/fotos/6.jpg" class="d-block  w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
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
      <div class="reporte container col-md-12">
          <h4 class="lista">{{$dato->first()->gestion->nombre_gestion}}</h4>
      </div>
      <div class=" container col-md-12">
          <h4 class="lista_sub">Eventos</h4>
      </div>
      <div class="col-md-12 mx-auto">
          <div class="form-row">
              @foreach($dato->where('id_disc',NULL)->groupBy('titulo') as $img1)
              <div class="col-md-4 img_galeria cubo">
                      <a class="title-span" href="{{ route('centro.evento_informacion',[$img1->first()->titulo,$dato->first()->id_gestion]) }}">
                          <div class="text-center img_galeria cubo" style="margin-top: 20px">
                              <img class="mx-auto d-block cubo" src="/storage/fotos/{{ $img1->first()->foto}}" alt="" width="" height="200px">
                              <span class="lista_sub_disc">{{$img1->first()->titulo}}</span><br>
                          </div>
                      </a>
                </div>
              @endforeach
          </div>
      </div>
      <div class="margin_top container col-md-12">
          <h4 class="lista_sub_rep">Galeria de las disciplinas</h4>
      </div>
      <div class="col-md-12 mx-auto">
          <div class="form-row">
              @foreach($dato->where('id_disc',"!=",NULL)->groupBy('id_disc') as $img)
              <div class="col-md-4 img_galeria cubo">
                      <a class="title-span" href="{{ route('centro.evento_info',[$img->first()->id_disc,$dato->first()->id_gestion]) }}">
                          <div class="text-center img_galeria cubo" style="margin-top: 20px">
                              <img class="mx-auto d-block cubo" src="/storage/fotos/{{ $img->first()->foto}}" alt="" width="" height="200px">
                              <span class="lista_sub_disc">{{ $img->first()->disciplina->nombre_disc." ".$img->first()->disciplina->nombre_categoria($img->first()->disciplina->categoria)." ".$img->first()->disciplina->nombre_subcateg($img->first()->disciplina->sub_categoria)}}</span><br>
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