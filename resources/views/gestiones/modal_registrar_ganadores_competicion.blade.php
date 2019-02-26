{!! Form::open(['route'=>'gestion.registrar_ganadores_competicion','method' => 'POST','id'=>'form_reg_ganadores']) !!}
        <!-- Modal -->
        <div class="modal fade" id="modalGanadoresCompeticion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                {!! Form::text('id_disc',null, ['id'=>'id_dis']) !!}
                                {!! Form::text('id_gestion',$gestion->id_gestion, ['id'=>'id_gest']) !!}
                            </div>
                                <div class="container col-md-12" id="resultado">
                                       <div class="form-row">
                                                {!! Form::label('primero', 'Primer lugar:', []) !!}
                                                
                                                {!! Form::select('1', [], null, ['id'=>'1','class'=>'form-control','placeholder'=>'Seleccione']) !!}
                                             
                                       </div>
                                       <div class="form-row ">
                                       {!! Form::label('segundo', 'Segundo lugar:', []) !!}
                                       {!! Form::select('2', [], null, ['id'=>'2','class'=>'form-control','placeholder'=>'Seleccione']) !!}
                                    </div>
                                    <div class="form-row">
                                       {!! Form::label('tercero', 'Tercer lugar:', []) !!}
                                       {!! Form::select('3', [], null, ['id'=>'3','class'=>'form-control','placeholder'=>'Seleccione']) !!}
                                    </div>
                                </div>
                        </div>
                    </div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            {!! Form::submit('Aceptar', ['class'=>'btn btn-primary','id'=>'aceptar_resultado']) !!}
                    </div>
                </div>      
            </div>
        </div>
 {!! Form::close() !!}
 <script> 
        var RegistrarGanadoresCompeticion = function(id_disc){  
            var id_gestion = $('#id_gest').val();
            $('#id_dis').val(id_disc);
            var route = "{{ url('gestion') }}/"+id_gestion+"/"+id_disc+"/array_jugadores_ajax";
            //var i=1;
            //var clubs = new Array();
            $.get(route, function(data){
                //$(data).each(function(key,value){
                    
                    //clubs[value.id_club]= value.nombre_club;
                    var html_fases = '<option value="">seleccione</option>';
                    for (var i = 0; i < data.length; i++) {
                        html_fases += '<option value=" ' + data[i].id_jugador + '"> ' + data[i].nombre_club +': '+data[i].nombre_jugador+' '+data[i].apellidos_jugador+ '</option>';
                        $('#1').html(html_fases);
                        $('#2').html(html_fases);
                        $('#3').html(html_fases);
                        //console.log(html_fases);
                    }
                    //i++;
            });
        }
 </script>
 {{--  @section('scripts')
 //si fuanciona lo llebams a un archivo gg
  {!! Html::script('/js/definir_ganador.js') !!}
@endsection  --}}