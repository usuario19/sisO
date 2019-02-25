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
                                           <div class="form-group">
                                                {!! Form::label('primero', 'Primer lugar:', []) !!}</div>
                                           <div class="form-group">
                                                {!! Form::select('primero', [], null, ['id'=>'primero','class'=>'form-control','placeholder'=>'Seleccione']) !!}
                                            
                                           </div>
                                            
                                       </div>
                                       <div class="form-row">
                                       {!! Form::label('segundo', 'Segundo lugar:', []) !!}
                                       {!! Form::select('segundo', [1], null, ['id'=>'segundo','class'=>'form-control','placeholder'=>'Seleccione']) !!}
                                    </div>
                                    <div class="form-row">
                                       {!! Form::label('tercero', 'Tercer lugar:', []) !!}
                                       {!! Form::select('tercero', [1], null, ['id'=>'tercero','class'=>'form-control','placeholder'=>'Seleccione']) !!}
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
        var RegistrarGanadores = function(id_gestion,id_disc){
          var route = "{{ url('gestion') }}/"+id_gestion+"/"+id_disc+"/array_clubs_ajax";
          $.get(route, function(data){
            $("#id_disc").val(id_disc);
            console.log(data.nombre_club);
            //alert("/storage/logos/"+data.logo);
            //$("#primero").val(data.clubs);
            //$("#segundo").val(data.clubs);
            //$("#tercero").val(data.clubs);
          });
        }
 </script>
 {{--  @section('scripts')
 //si fuanciona lo llebams a un archivo gg
  {!! Html::script('/js/definir_ganador.js') !!}
@endsection  --}}