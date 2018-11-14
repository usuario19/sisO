@extends('plantillas.main')
@section('title')
    SisO - Lista de Clubs
@endsection

@section('content')

  <div class="container-fluid">
      <div class="container text-center">
          <h1>CLUBS</h1>
      </div>
  </div>
  <div class="container">
{{--    <div class="container">  --}}
    <div class="container col-md-12 bg-danger" style="margin: auto; background: blue">
      @foreach($clubs as $club)
      <div class="float-left" style="width: 120px; margin: 20px">
          <div class="card" style="margin: auto">
            <div style="position: relative; height: 140px">
                <img class="card-img-top" src="/storage/logos/{{ $club->logo}}" alt="Card image cap" style="height: 120px; position: absolute">
            
              <div class="card-body text-center" style="height: 20px; width:100%; padding: 0%; background:#1C2833; opacity:0.7;position:absolute;bottom: 0%; color: white;font-weight: bolder">
                {{--  <p class="card-title" style="text-transform: uppercase">{{ $club->nombre_club}}</p>  --}}
                <p class="card-text" style="opacity: 1;text-transform: uppercase ;font-size: 10px">{{ $club->ciudad}}</p>
                {{--  <a href="#" class="btn btn-primary">Go somewhere</a>  --}}
              </div>
            </div>
          </div>
          <br>
      </div>
      @endforeach
    </div>
    
{{--  </div>  --}}
</div>
{{--  </div>
 {{ $clubs->links() }}  --}}
{{--  @include('club.modal_edit_club')  --}}
{{--  <script> 
var Mostrar = function(id){
  var route = "{{ url('club') }}/"+id+"/edit";
  $.get(route, function(data){
    $("#edit_id_club").val(data.id_club);
    //alert("/storage/logos/"+data.logo);
    $("#nombre_club").val(data.nombre_club);
    $("#edit_administrador").val(data.id_administrador);
    $("#edit_ciudad").val(data.ciudad);
    var url = '/storage/logos/'+data.logo
    var file = $.get(url);
        $('#imgOrigen2').attr('src', url);
    $("#edit_descripcion").val(data.descripcion_club);
  });
}
</script>  --}}
@endsection

@section('scripts')

  {!! Html::script('/js/script.js') !!}
   {!! Html::script('/js/filtrar_por_nombre.js') !!}
  {!! Html::script('/js/vista_previa.js') !!}

@endsection

