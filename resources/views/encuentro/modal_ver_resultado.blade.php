{!! Form::open(['route'=>'encuentro.reg_resultado','method' => 'POST']) !!}
        <!-- Modal -->
        <div class="modal fade" id="modalVerResultado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Resultados</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">  
                            <div style="display: none">
                                {!! Form::text('id_disc',$disciplina->id_disc, []) !!}
                                {!! Form::text('id_gestion',$gestion->id_gestion, []) !!}
                            </div>
                            <div class="row col-md-12">
                                    <div class="form-group col-md-4">
                                                    <div style="display: none">
                                                        {!! Form::text('id_encuentro1', null, ['id'=>'id_encuentro_ver2']) !!}
                                                        {!! Form::text('id_encuentro_club_part1',null, ['id'=>'id_encuentro_club_part_ver1']) !!}
                                                    </div>
                                                    <div class="col-md-12" style="text-align: center;">
                                                            <img id="imgClub1" class="rounded mx-auto d-block float-left" src="" alt="" height=" 100px" width="100px">
                                                        {!! Form::label('club1',null, ['id'=>'nombre_club_ver2']) !!} 
                                                            </div>
                                                </div>
                                    <div class="form-group col-md-4">
                                        <div class="row">
                                                <div class="form-group col-md-4" style="text-align: center;">
                                                        <div class="col-md-12" style="text-align: center;">
                                                                <h1 id='puntos_ver1'></h1>
                                                            </div> 
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <h3>vs</h3>
                                                </div>
                                                <div class="form-group col-md-4" style="text-align: center;">
                                                        <h1 id='puntos_ver2'></h1>
                                                </div>
                                        </div>
                                    </div>
                                            <div class="form-group col-md-4">
                                        <div style="display: none">
                                            {!! Form::text('id_encuentro2',null,['id'=>'id_encuentro_ver2']) !!}
                                            {!! Form::text('id_encuentro_club_part2', null, ['id'=>'id_encuentro_club_part_ver2']) !!}
                                        </div>
                                        <div class="col-md-12" style="text-align: center;">
                                                <img id="imgClub2" class="rounded mx-auto d-block float-left" src="" alt="" height=" 100px" width="100px">
                                                {!! Form::label('club2',null, ['id'=>'nombre_club_ver2']) !!}
                                                 </div>     
                                </div>
                                </div>
                                
                        </div>
                    </div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-block btn_aceptar" data-dismiss="modal">ACEPTAR</button>
                            {{-- {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!} --}}
                    </div>
                </div>      
            </div>
        </div>
 {!! Form::close() !!}
 <script>
    var VerResultado = function(id_encuentro) {
      var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_ajax";
      $.get(route, function(data) {
          var i = 1;
          $(data).each(function(key,value){
              $("#id_encuentro_ver"+i).val(value.id_encuentro);
              $("#id_encuentro_club_part_ver"+i).val(value.id_encuentro_club_part);
             // alert("#nombre_club"+i);
              $("#nombre_club_ver"+i).val(value.nombre_club);
              $("#id_club_ver"+i).val(value.id_club);
              $("#puntos_ver"+i).text(value.puntos);
              var url = '/storage/logos/'+value.logo
                var file = $.get(url);
                    $('#imgClub'+i).attr('src', url);
              i++;
          });
      });
  }
  </script>
 @section('scripts')
   {!! Html::script('/js/resultado.js') !!}
@endsection