@extends('plantillas.main')

@section('title')
SisO - Lista de gestiones
@endsection
@section('content')


<div class="container mx-auto padd_none">
  <div class="container-fluid" style="background: #333333">
    <div class="div-title-principal container text-center" style="height: 80px">
      <h5 class="lista text-white">Turismo</h5>
    </div>
  </div><br>
  <nav class="navbar navbar-expand-lg menu">
      <ul class="navbar-nav btn-block">
        <li class="nav-item link competicion col-md-6">
          <a class="nav-link link   col-md-12" href="{{ route('principal.turismo') }}"><span class="lista_sub">LUGARES TURÍSTICOS</span></a>
        </li>
        <li class="nav-item link competicion col-md-6">
          <a class="nav-link link active col-md-12" href="{{ route('principal.gastronomia') }}"><span class="lista_sub">LUGARES GASTRONÓMICOS</span></a>
        </li>
      </ul>
    </nav>

 {{--   <div class="col-md-12 mx-auto padd_none">
    <div class="card-">
      <h5 class="lista text-center" style="color:black">Federacion nacional de trabajadores universitarios</h5>
    </div>  --}}

    <div class="bd-example" >
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" >
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="6"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="7"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="8"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="9"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="10"></li>
        </ol>
        <div class="carousel-inner overflow-hidden" style="height: 400px">
          <div class="carousel-item active">
            <img src="/storage/foto_disc/11.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/storage/foto_disc/12.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Primer partido</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/storage/foto_disc/13.jpg" class="d-block  w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
          </div>
          <div class="carousel-item">
              <img src="/storage/foto_disc/14.jpg" class="d-block  w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
              </div>
            </div>
            <div class="carousel-item">
                <img src="/storage/foto_disc/15.jpg" class="d-block  w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
              </div>
              <div class="carousel-item">
                  <img src="/storage/foto_disc/16.jpg" class="d-block  w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                  </div>
                </div>
                <div class="carousel-item">
                    <img src="/storage/foto_disc/17.jpg" class="d-block  w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Third slide label</h5>
                      <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                      <img src="/storage/foto_disc/18.jpg" class="d-block  w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/storage/foto_disc/19.jpg" class="d-block  w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Third slide label</h5>
                          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                          <img src="/storage/foto_disc/20.jpg" class="d-block  w-100" alt="...">
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
        {{--  Lugares turisticos  --}}

    <div class="container">
<br>
     {{--   <div class="margin_top container col-md-12">
          <h4 class="lista">lugares gasrtonomicos de Cochabamba</h4>
      </div>  --}}
      <div class=" container col-md-12">
          <h4 class="lista_sub"></h4>
      </div>
      <div class="card my-2 text-white bg-primary col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/11.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                  <h5>RESTAURANTE EL PALMAR</h5>
                  <h6>PLATO: "PAMPAKU"</h6>

                  <p>
                      Se trata de un plato hecho a base a carne de pollo, res, cordero, cerdo, papa, camote, yuca y plátano.
                  </p>
                    <a class="title-span btn btn-light" href="https://goo.gl/maps/wqrXLS2byq9eQp968">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo">
                              place
                          </i>Como llegar
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class="card my-3 text-white bg-secondary col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/12.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>CLIZA</h5>
                  <h6>PLATO: "PICHON"</h6>
                  <p>
                      Es un plato hecho con carne de pichón (cría de paloma), hervida y dorada a la brasa. Se acompaña con arroz y papa cocida.
                  </p>
                    <a class="title-span btn btn-light" href="https://goo.gl/maps/wqrXLS2byq9eQp968">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo">
                              place
                          </i>Como llegar
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class="card my-3 text-white bg-success col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/18.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>CASA DE CAMPO</h5>
                  <h6>PLATO: "SILPANCHO COCHABAMBINO"</h6>
                  <p>
                      Es un plato seco con carne de res apanada, frita al sartén, acompañada de huevo frito y ensalada cruda de cebolla, tomate y locoto (llajua). Se sirve con arroz y papa frita.
                  </p>
                    <a class="title-span btn btn-light" href="https://goo.gl/maps/wqrXLS2byq9eQp968">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo">
                              place
                          </i>Como llegar
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class="card my-3 text-white bg-danger col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/19.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>CRISTO DE LA CONCORDIA</h5>
                  <p>
                      El denominado Cristo de La Concordia es una colosal estatua ubicada en la ciudad de Cochabamba- Bolivia, que desde el año 1987 forma parte del atractivo turístico de la ciudad. La imagen es considerada la estatua de Jesús más grande del mundo. Dadas sus dimensiones, la imagen es visible desde prácticamente cualquier punto de la ciudad.
                  </p>
                    <a class="title-span btn btn-light" href="https://goo.gl/maps/wqrXLS2byq9eQp968">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo">
                              place
                          </i>Como llegar
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class=" card my-3 text-dark bg-warning col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/20.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>CRISTO DE LA CONCORDIA</h5>
                  <p>
                      El denominado Cristo de La Concordia es una colosal estatua ubicada en la ciudad de Cochabamba- Bolivia, que desde el año 1987 forma parte del atractivo turístico de la ciudad. La imagen es considerada la estatua de Jesús más grande del mundo. Dadas sus dimensiones, la imagen es visible desde prácticamente cualquier punto de la ciudad.
                  </p>
                    <a class="title-span btn btn-light" href="https://goo.gl/maps/wqrXLS2byq9eQp968">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo">
                              place
                          </i>Como llegar
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class="card my-3 text-dark bg-transparent col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/13.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>RESTAURANT CASA DE CAMPO</h5>
                  <h6>PLATO: "SILPANCHO COCHABAMBINO"</h6>
                  <p>
                      Es un plato seco con carne de res apanada, frita al sartén, acompañada de huevo frito y ensalada cruda de cebolla, tomate y locoto (llajua). Se sirve con arroz y papa frita.
                  </p>
                    <a class="title-span btn btn-light" href="https://goo.gl/maps/wqrXLS2byq9eQp968">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo">
                              place
                          </i>Como llegar
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class="card my-3 text-white bg-info col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/14.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>CRISTO DE LA CONCORDIA</h5>
                  <p>
                      El denominado Cristo de La Concordia es una colosal estatua ubicada en la ciudad de Cochabamba- Bolivia, que desde el año 1987 forma parte del atractivo turístico de la ciudad. La imagen es considerada la estatua de Jesús más grande del mundo. Dadas sus dimensiones, la imagen es visible desde prácticamente cualquier punto de la ciudad.
                  </p>
                    <a class="title-span btn btn-light" href="https://goo.gl/maps/wqrXLS2byq9eQp968">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo">
                              place
                          </i>Como llegar
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class="card my-3 text-dark bg-success col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/15.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>CRISTO DE LA CONCORDIA</h5>
                  <p>
                      El denominado Cristo de La Concordia es una colosal estatua ubicada en la ciudad de Cochabamba- Bolivia, que desde el año 1987 forma parte del atractivo turístico de la ciudad. La imagen es considerada la estatua de Jesús más grande del mundo. Dadas sus dimensiones, la imagen es visible desde prácticamente cualquier punto de la ciudad.
                  </p>
                    <a class="title-span btn btn-light" href="https://goo.gl/maps/wqrXLS2byq9eQp968">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo">
                              place
                          </i>Como llegar
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class="card my-3 text-white bg-dark col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/16.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>CRISTO DE LA CONCORDIA</h5>
                  <p>
                      El denominado Cristo de La Concordia es una colosal estatua ubicada en la ciudad de Cochabamba- Bolivia, que desde el año 1987 forma parte del atractivo turístico de la ciudad. La imagen es considerada la estatua de Jesús más grande del mundo. Dadas sus dimensiones, la imagen es visible desde prácticamente cualquier punto de la ciudad.
                  </p>
                    <a class="title-span btn btn-light" href="https://goo.gl/maps/wqrXLS2byq9eQp968">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo">
                              place
                          </i>Como llegar
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class="card my-3 col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/17.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>Pampaku</h5>
                  <p>
                  </p>
                    <a class="title-span btn btn-light" href="https://goo.gl/maps/wqrXLS2byq9eQp968">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo">
                              place
                          </i>Como llegar
                        </span>
                    </a>
              </div>
          </div>
      </div>
      
  </div>
    </div>
  </div>
</div>

</div>
@include('sweetalert::cdn')
@include('vendor.sweetalert.view')
@endsection