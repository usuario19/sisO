
@extends('plantillas.main')

@section('title')
    SisO - Home
@endsection

@section('content')
<div class="container-fluid" style="padding: 0%">
  <div class="mx-auto col-md-11">
    <div class="row">
      <div class="col-md-10">
        fixture
      </div>
      <div class="col-md-2">
        avisos
      </div>
    </div>
  </div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="height: 500px; overflow: hidden">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="img-fluid d-block w-100" src="/storage/logos/h1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/storage/logos/h2.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/storage/logos/h3.jpg" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/storage/logos/h4.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev a-control" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next a-control" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</div>

@endsection