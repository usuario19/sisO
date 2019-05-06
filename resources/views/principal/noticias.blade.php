@extends('plantillas.main')

@section('title')
    SisO - Lista de gestiones
@endsection
@section('content')

   
    <div class="container padd_none">
            <div class="container-fluid" style="background: #F39C12">
                    <div class="div-title-principal container text-center" {{--  style="padding-left: 100px"  --}}>
                        <h5 class="title_gestion">TURISMO</h5>
                    </div>
                </div><br>
            
        <div class="col-md-12 mx-auto padd_none">
            <div class="card">
                <div class="card-header">
                <h5 class="title_gestion" style="color:black">Titulo</h5>
                </div>
                <div class="card-body padd_none">
                        <div class="bd-example">
                                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="">
                                  <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                  </ol>
                                  <div class="carousel-inner" style="">
                                    <div class="carousel-item active">
                                      <img src="/storage/logos/1.jpg" class="d-block w-100" alt="...">
                                      <div class="carousel-caption d-none d-md-block">
                                        <h5>First slide label</h5>
                                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                      </div>
                                    </div>
                                    <div class="carousel-item">
                                      <img src="/storage/logos/2.jpg" class="d-block w-100" alt="...">
                                      <div class="carousel-caption d-none d-md-block">
                                        <h5>Second slide label</h5>
                                        <p>Primer partido</p>
                                      </div>
                                    </div>
                                    <div class="carousel-item">
                                      <img src="/storage/logos/3.jpg" class="d-block  w-100" alt="...">
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
                </div>
                <div class="card-footer">
                    Descripcion de las fotos
                </div>
                <div class=""></div>
            </div>
        </div>

    </div>
    {{--  <div class="container-fluid" style="background: #ED1941">
        <div class="div-title-principal container text-center">
                <h1 class="title-principal">{{strtoupper($disciplina->nombre_disc)}}</h1>
        </div>
    </div>  --}}
    

    @include('sweetalert::cdn') 
 @include('vendor.sweetalert.view') 
@endsection
  

