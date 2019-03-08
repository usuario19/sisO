{!! Form::open(['route'=>'gestion.registrar_ganadores','method' => 'POST','id'=>'form_reg_ganadores']) !!}
        <!-- Modal -->
        <div class="modal fade" id="modalGanadores" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                {!! Form::text('id_disc',null, ['id'=>'id_disc']) !!}
                                {!! Form::text('id_gestion',$gestion->id_gestion, ['id'=>'id_gestion']) !!}
                            </div>
                                <div class="container col-md-12" id="resultado">
                                       <div class="form-row">
                                                {!! Form::label('primero', 'Primer lugar:', []) !!}
                                                {!! Form::select('1', [], null, ['id'=>'primero','class'=>'form-control','placeholder'=>'Seleccione','required'=>'required']) !!}
                                             
                                       </div>
                                       <div class="form-row ">
                                       {!! Form::label('segundo', 'Segundo lugar:', []) !!}
                                       {!! Form::select('2', [], null, ['id'=>'segundo','class'=>'form-control','placeholder'=>'Seleccione','required'=>'required']) !!}
                                    </div>
                                    <div class="form-row">
                                       {!! Form::label('tercero', 'Tercer lugar:', []) !!}
                                       {!! Form::select('3', [], null, ['id'=>'tercero','class'=>'form-control','placeholder'=>'Seleccione','required'=>'required']) !!}
                                    </div>
                                </div>
                        </div>
                    </div>    
                    <div class="modal-footer">
                            <div class="row col-md-12">
                                    <div class="form-group col-md-6">
                                        {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn-primary btn_aceptar']) !!}
                                        </div>
                                    <div class="form-group col-md-6">
                                {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary']) !!}
                                </div>
                                
                                </div>
                    </div>
                </div>      
            </div>
        </div>
 {!! Form::close() !!}
 <script> 
        var RegistrarGanadores = function(id_disc){  
            var id_gestion = $('#id_gestion').val();
            $('#id_disc').val(id_disc);
            var route = "{{ url('gestion') }}/"+id_gestion+"/"+id_disc+"/array_clubs_ajax";
            //var i=1;
            //var clubs = new Array();
            $.get(route, function(data){
                //$(data).each(function(key,value){
                    
                    //clubs[value.id_club]= value.nombre_club;
                    var html_fases = '<option value="">seleccione</option>';
                    for (var i = 0; i < data.length; i++) {
                        html_fases += '<option value=" ' + data[i].id_club + '"> ' + data[i].nombre_club + '</option>';
                        $('#primero').html(html_fases);
                        $('#segundo').html(html_fases);
                        $('#tercero').html(html_fases);
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