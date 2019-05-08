@extends('plantillas.main')

@section('title')
SisO - Lista de gestiones
@endsection
@section('content')


<div class="container mx-auto padd_none">
  <div class="container-fluid" style="background: #42B72A">
    <div class="div-title-principal container text-center" style="height: 80px">
      <h5 class="lista text-white">Turismo</h5>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg menu mb-3">
      <ul class="navbar-nav btn-block">
        <li class="nav-item link competicion col-md-6">
          <a class="nav-link link  active col-md-12" href="{{ route('principal.turismo') }}"><span class="lista_sub_turismoc">LUGARES TURÍSTICOS</span></a>
        </li>
        <li class="nav-item link competicion col-md-6">
          <a class="nav-link link  col-md-12" href="{{ route('principal.gastronomia') }}"><span class="lista_sub_turismob">LUGARES GASTRONÓMICOS</span></a>
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
            <img src="/storage/foto_disc/11.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              
            </div>
          </div>
          <div class="carousel-item">
            <img src="/storage/foto_disc/12.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              
            </div>
          </div>
          <div class="carousel-item">
            <img src="/storage/foto_disc/21.jpg" class="d-block  w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              
            </div>
          </div>
          <div class="carousel-item">
              <img src="/storage/foto_disc/14.jpg" class="d-block  w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                
              </div>
            </div>
            <div class="carousel-item">
                <img src="/storage/foto_disc/15.jpg" class="d-block  w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  
                </div>
              </div>
              <div class="carousel-item">
                  <img src="/storage/foto_disc/16.jpg" class="d-block  w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    
                  </div>
                </div>
                <div class="carousel-item">
                    <img src="/storage/foto_disc/17.jpg" class="d-block  w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      
                    </div>
                  </div>
                  <div class="carousel-item">
                      <img src="/storage/foto_disc/18.jpg" class="d-block  w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        
                      </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/storage/foto_disc/19.jpg" class="d-block  w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                      </div>
                      <div class="carousel-item">
                          <img src="/storage/foto_disc/20.jpg" class="d-block  w-100" alt="...">
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
                  <h6>ESPECIALIDAD: "PAMPAKU"</h6>

                  <p>
                      Se trata de un ESPECIALIDAD hecho a base a carne de pollo, res, cordero, cerdo, papa, camote, yuca y plátano.
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/qiyoJJHbpUNu7WWD8">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
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
                  <h6>ESPECIALIDAD: "PICHON"</h6>
                  <p>
                      Es un plato hecho con carne de pichón (cría de paloma), hervida y dorada a la brasa. Se acompaña con arroz y papa cocida.
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/QajegBvL5nDQ8PFu9">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
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
                    <h5>RESTAURANTE CASA DE CAMPO</h5>
                  <h6>ESPECIALIDAD: "SILPANCHO COCHABAMBINO"</h6>
                  <p>
                      Es un plato seco con carne de res apanada, frita al sartén, acompañada de huevo frito y ensalada cruda de cebolla, tomate y locoto (llajua). Se sirve con arroz y papa frita.
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/DKq4aAcHmogmkAGA7">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
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
                    <h5>RESTAURANTE PUNTO DE ENCUENTRO</h5>
                    <h6>ESPECIALIDAD: "CHARQUE COCHABAMBINO"</h6>
                  <p>
                      Este plato es elaborado con charque de res, arroz, mote (maíz amarillo) papas medianas, huevo, quesillo, tomates, cebollas medianas, locotos amarillos, quirquiña y sal.
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/GNYUtCg5e3G7w32V8">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
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
                    <h5>RESTAURANTE AMERICA</h5>
                    <h6>ESPECIALIDAD: "PIQUE MACHO"</h6>
                  <p>
                      Plato elaborado con carne de res picada, salchicha, chorizo, locoto, cebolla, papa frita.
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
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
                    <h5>RESTAURANTE CHORICERIA DOÑA FIDELIA</h5>
                    <h6>ESPECIALIDAD: "CHORIZOS ORIGINALES TARATA"</h6>
                  <p>
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/qQj2HyCmeZgEjJ276">
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
                              <img class="mx-auto d-block " src="/storage/foto_disc/17.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>RESTAURANTE LAPING DOÑA IRMA</h5>
                    <h6>ESPECIALIDAD: "LAPING"</h6>
                  <p>
                      Es un plato con carne de res pero con la cualidad de que la carne es súuuper blanda. Para esto, se la remoja en jugo de papaya una noche antes. Esto le da su sabor característico. Se cocina la carne al horno y viene con papas horneadas, habas, choclo. Además de la típica ensalada de quesillo, cebolla y tomate.
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/GZ9fLBktpn9cvvTV9">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
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
                    <h5>COMEDOR DOÑA BLANCA</h5>
                  <h6>ESPECIALIDAD: "PUCHERO"</h6>
                  <p>
                      Un plato casi obsceno por la cantidad de estímulos que ofrece al paladar. Un costillar de cordero cocinado con ají y hierba buena. El detalle es que se acompaña con frutas dulces de temporada como duraznos y peras.
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/GmpAxZ8MYdoSoWxF9">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
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
                    <h5>RESTAURANTE DOÑA FELY</h5>
                    <h6>ESPECIALIDAD: "FIDEOS UCHU"</h6>
                  <p>
                      Aji de Fideo Tradicion en Cochabamba de todos los jueves.
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/bJsLMjHU8LN91GCg8">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
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
                    <h5>RESTAURANTE PLANCHITAS ORIGINALES NORTE</h5>
                    <h6>ESPECIALIDAD: "PLANCHITA"</h6>
                  <p>
                  <p>
                      Plato típico Servido en una plancha consta de carne papa salchicha chorrizo yuca chorrellana que ofrece un sabor suculento al paladar
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/sqsBBxmBS5buWYGW8">
                      <span class="calendario_turismo">
                          <i class="material-icons calendario_turismo" style="top:5px">
                              place
                          </i>Ubicación
                        </span>
                    </a>
              </div>
          </div>
      </div>
      <div class=" card my-3 text-dark bg-light col-md-12 mx-auto">
          <div class="form-row">
              <div class="col-md-4 img_galeria ">
                      <a class="title-span" >
                          <div class="text-center img_galeria " style="margin-top: 20px">
                              <img class="mx-auto d-block " src="/storage/foto_disc/21.jpg" alt="" width="" height="200px">
                              <span class="lista_sub_disc"></span><br>
                          </div>
                      </a>
                </div>
                <div class="col-md-8 img_galeria p-3">
                    <h5>RESTAURANTE LOS CHICHARRONES ORIGINALES 1</h5>
                    <h6>ESPECIALIDAD: "CHICHARRON DE CERDO"</h6>
                  <p>
                  <p>
                  </p>
                    <a class="title-span btn btn-light" target="_blank" href="https://goo.gl/maps/dPRHVzb5FTGCksG68">
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