@extends('plantillas.main')

@section('title')
SisO - Lista de gestiones
@endsection
@section('content')


<div class="container mx-auto padd_none">
  <div class="container-fluid" style="background:#0264A2">
    <div class="div-title-principal container text-center" style="height: 80px">
      <h5 class="lista text-white">Turismo</h5>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg menu mb-3">
      <ul class="navbar-nav btn-block">
        <li class="nav-item link competicion col-md-6">
          <a class="nav-link link active  col-md-12" href="{{ route('principal.turismo') }}"><span class="lista_sub_turismo">LUGARES TURÍSTICOS</span></a>
        </li>
        <li class="nav-item link competicion col-md-6">
          <a class="nav-link link  col-md-12" href="{{ route('principal.gastronomia') }}"><span class="lista_sub_turismo">LUGARES GASTRONÓMICOS</span></a>
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
        <div class="carousel-inner overflow-hidden" style="max-height: 400px">
          <div class="carousel-item active">
            <img src="/storage/foto_disc/2banner.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              
            </div>
          </div>
          <div class="carousel-item">
            <img src="/storage/foto_disc/1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              
            </div>
          </div>
          <div class="carousel-item">
            <img src="/storage/foto_disc/3.jpg" class="d-block  w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              
            </div>
          </div>
          <div class="carousel-item">
              <img src="/storage/foto_disc/4.jpg" class="d-block  w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
                <img src="/storage/foto_disc/5.jpg" class="d-block  w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
              </div>
              <div class="carousel-item">
                  <img src="/storage/foto_disc/6.jpg" class="d-block  w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                  </div>
                </div>
                <div class="carousel-item">
                    <img src="/storage/foto_disc/7.jpg" class="d-block  w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                  </div>
                  <div class="carousel-item">
                      <img src="/storage/foto_disc/8.jpg" class="d-block  w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/storage/foto_disc/2.jpg" class="d-block  w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                      </div>
                      <div class="carousel-item">
                          <img src="/storage/foto_disc/10.jpg" class="d-block  w-100" alt="...">
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
        {{--  Lugares turisticos  --}}

    <div class="container">
     <br>
      {{--  <div class="margin_top container col-md-12">
          <h4 class="lista">lugares turísticos de Cochabamba</h4>
      </div>  --}}
      <div class=" container col-md-12">
          <h4 class="lista_sub"></h4>
      </div>
      <div class="card my-2 card border-primary text-primary col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/1.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                  <h5>CRISTO DE LA CONCORDIA</h5>
                  <p>
                      El denominado Cristo de La Concordia es una colosal estatua ubicada en la ciudad de Cochabamba- Bolivia, que desde el año 1987 forma parte del atractivo turístico de la ciudad. La imagen es considerada la estatua de Jesús más grande del mundo. Dadas sus dimensiones, la imagen es visible desde prácticamente cualquier punto de la ciudad.
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/wqrXLS2byq9eQp968">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class="card my-3 text-secondary border-secondary col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/2.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>Catedral Metropolitana de San Sebastián Arquidiócesis de Cochabamba</h5>
                  <p>
                      Declarado Monumento Nacional por Decreto Supremo Nº 8171 el 7 de diciembre de 1967. La actual catedral de la ciudad de Cochabamba situada en la Plaza de Armas, ha sido reedificada en dos oportunidades y supuestamente en el mismo lugar. La primera iglesia, pequeña y provisional, según refiere la documentación de la época, habría sido edificada antes de la fundación de la Villa de Oropesa en el primitivo Asiento de Kanata.
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/iBmpVBEUhSsDUhwe6">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class="card my-3 text-success border-success col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/8.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>Convento Santa Teresa</h5>
                  <p>
                      De estilo barroco este convento es una de las construcciones más antiguas que existen en Cochabamba, pues fue construido en 1760. La construcción inicial quedó inconclusa y se retomó cuarenta años después con una peculiar construcción dentro de otra.
                  </p>
                    <a class="title-span btn btn-light target="_blank"" href="https://goo.gl/maps/fehFKzudpiiGN8vv5">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class="card my-3 text-danger border-danger col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/9.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>Lago Corani</h5>
                  <p>
                      Colomi es la Segunda Sección Municipal de la provincia Chapare ubicada a 53 kilómetros de la ciudad de Cochabamba. La región presenta más de 60 lagunas, siendo la más importante y de mayor extensión la laguna Corani que produce energía eléctrica en las plantas de Santa Isabel y Corani, por el cual se ha considerado al municipio como la capital hidroeléctrica de Bolivia.
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/MArza84JRocbFafG8">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class=" card my-3 text-warning border-warning col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/10.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>Parque de Aves Agroflori</h5>
                  <p>
                      El parque de las aves "agroflori" fue fundada por Marcelo Antezana aproximadamente en el año 2016, comenzó con un par de aves luego fueron llegando mas y mas.


                      Agroflori es un refugio de aves donde cuidan, rescatan, recuperan aves víctimas de tráfico y maltrato, pero en agroflori hoy en día no solo hay aves de diferentes especies sino también se encuentran algunos animales como tortugas, zorro, etc.
                  </p>
                    <a class="title-span btn btn-light"  target="_blank" href="https://goo.gl/maps/adk3LNLp5pHNbKKD9">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class="card my-3 text-dark border-transparent col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/3.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>Palacio Portales</h5>
                  <p>
                      Si te gusta lo elegante, visita este edificio construido entre los años 1915 y 1927 en base al diseño del arquitecto francés Eugene Bliault. Fue la residencia de Simón Iturri Patiño, millonario boliviano, llamado "el barón del estaño". Este lugar es un bello ejemplo de estilo ecléctico, donde elementos heterogéneos que lo componen se fusionan resultando un conjunto de gran armonía e integración arquitectónica, sus jardines fueron diseñados por expertos japoneses, hechos a imitación de los existentes en el Palacio Versalles de París. Actualmente ahí funciona el Centro Pedagógico y Cultural Simón I. Patiño.
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/osUAHXNfv9mH36Ej6">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class="card my-3 text-info border-info col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/4.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>Convento de San Francisco</h5>
                  <p>
                      El templo y el convento fueron construidos con piedra labrada y concluidos a mediados del siglo XVIII, la fachada de la iglesia de San Francisco corresponde al estilo barroco. La torre fue construida en 1885. El interior también de estilo barroco, tiene una planta de tres naves, separadas con bóveda de cañón y cúpula de media naranja, con cuatro ventanas en el crucero. Se terminó en 1753; la construcción duró 40 años; su retablo es famoso por la fina trama de su talla, tratado en pan de oro. La iglesia también cuenta con una pinacoteca que presenta una valiosa colección de obras artísticas: renacentistas, manieristas, barrocas, mestizas, neoclásicas.
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/ve3RLxJT8FJTYddk7">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class="card my-3 text-success border-success col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/5.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>Parque de la Familia</h5>
                  <p>
                      Cuenta con fuentes de agua, un sistema de sonido, además de iluminación de diodos emisores, conocidos como luces LED.
                      La combinación de estos elementos permite la proyección de imágenes en el agua y disparos del líquido a una altura de hasta 20 metros. El espectáculo se sincroniza con música.
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/oybpkQWZ95y6MZhC6">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class="card my-3 text-dark border-dark col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/6.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>Pico Tunari</h5>
                  <p>
                      Con sus 5030 m el Tunari es la montaña más alta visible desde la ciudad de Cochabamba. Dependiendo de la temporada, el pico nos espera con una vista espectacular del valle central o la sensación de estar flotando en las nubes que pasan.
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/EMLK4Dn6TE2cRdP29">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
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
                              <img class="mx-auto d-block " src="/storage/foto_disc/7.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>Laguna Angostura</h5>
                  <p>
                      Se trata de una laguna artificial que originalmente fue construida como una represa para riegos y actualmente también es uno de los lugares turísticos en los que se puede disfrutar de piscina, paseos en bote por la laguna, y de la comida de la zona. A orillas de la laguna se encuentran varios restaurantes cuya especialidad es el pescado, además de las dulces y cálidas cabañas que ofrecen alojamiento y servicios para celebrar ocasiones especiales.
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/wqrXLS2byq9eQp968">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
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