{!! Form::open(['route'=>'encuentro.reg_resultado_set','method' => 'POST','id'=>'reg_set']) !!}
<!-- Modal -->
<div class="modal fade" id="modalResultadoSet" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display: flex; align-items: center;">
                <img class="mr-1 img_tb_info" src="/storage/logos/voleibol.png" alt="">
                <span class="modal-title" id="exampleModalCenterTitle">Registar resultados de {{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) .":"}}</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container padd_none">
                   {{--  @if ($fase->fase_tipos->first()->tipos->nombre_tipo == 'eliminacion')
                    <div class="form-row col-md-12">
                        <div class="col-12 margin_top">
                            Seleccione las siguientes opciones en caso de que el partido tenga tiempo extra:
                        </div>
                        <div class="margin_top col-4">
                            <input type="checkbox" name="hab_te" id="t-extra" class="habilitar">
                            <label for="t-extra">Registrar puntos en tiempo extra</label>
                        </div>
                    </div>
                    @endif --}}
                    <div style="display: none">
                        {!! Form::text('id_disc',$disciplina->id_disc, []) !!} 
                        {!! Form::text('id_enc',$encuentro->id_encuentro, []) !!} 
                        {!! Form::text('id_gestion',$gestion->id_gestion, []) !!} 
                        {!! Form::text('id_fase',$fase->id_fase, []) !!}
                    </div>
                    <div class="form-row">
                        <div class="form-group container col-md-12">
                            {!! Form::label('set_jugados', 'Set jugados', []) !!}
                            {!! Form::select('set_jugados', [3=>'3',4=>'4',5=>'5'], null, ['id'=>'set_jugados','class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-row col-md-12 margin_none padd_none">
                        <div class="form-group col-md-6">
                            <div class="card">
                                <div style="display: none">
                                    {!! Form::text('id_encuentro_club_part1',null, ['id'=>'id_encuentro_club_part1'])
                                    !!}
                                </div>
                                <div class="margin_top col-md-12">
                                    {!! Form::label('equipo', 'Equipo 1', []) !!} 
                                    {!! Form::text('equipo1',$club1->nombre_club, ['id'=>'nombre_club1','class'=>'form-control','readonly'=>'true'])
                                    !!}
                                </div>
                                <div style="display: none">
                                    {!! Form::text('id_club1',$club1->id_club, ['id'=>'id_club1','class'=>'form-control','readonly'=>'true']) !!}
                                </div>
                                <div class="margin_top col-md-12">
                                    {!! Form::label('label', 'Puntos set', []) !!}
                                    @php
                                        $list = [NULL=>'X',1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10,
                                                11=>11,12=>12,13=>13,14=>14,15=>15,16=>16,17=>17,18=>18,19=>19,20=>20,
                                                21=>21,22=>22,23=>23,24=>24,25=>25,26=>26,27=>27,28=>28,29=>29,30=>30]
                                    @endphp
                                    <div class="form-row">
                                        <div class="form-group col-md-auto">
                                            {!! Form::label('set11', 'set 1', []) !!}
                                            {!! Form::select('set11', $list,null, ['id'=>'set11','class'=>'form-control form-control-sm']) !!}
                                        </div>
                                        <div class="form-group col-md-auto">
                                            {!! Form::label('set21', 'set 2', []) !!}
                                            {!! Form::select('set21', $list,null, ['id'=>'set21','class'=>'form-control form-control-sm']) !!}
                                        </div>
                                        <div class="form-group col-md-auto">
                                            {!! Form::label('set31', 'set 3', []) !!}
                                            {!! Form::select('set31', $list,null, ['id'=>'set31','class'=>'form-control form-control-sm']) !!}
                                        </div>
                                        <div class="form-group col-md-auto">
                                            {!! Form::label('set41', 'set 4', []) !!}
                                            {!! Form::select('set41', $list,null, ['id'=>'set41','class'=>'form-control form-control-sm']) !!}
                                        </div>
                                        <div class="form-group col-md-auto">
                                            {!! Form::label('set51', 'set 5', []) !!}
                                            {!! Form::select('set51', $list,null, ['id'=>'set51','class'=>'form-control form-control-sm']) !!}
                                        </div>
                                       {{--  <div class="form-group col-md-2">
                                            {!! Form::label('puntos_b1', 'set1', []) !!}
                                            {!! Form::text('puntos_b1', null, ['id'=>'set1','class'=>'form-control']) !!}
                                        </div> --}}
                                    </div>
                                    {!! Form::label('set_ganados1', 'Total sets ganados', []) !!}
                                    {!! Form::text('set_ganados1', null, ['id'=>'set_ganados1','class'=>'form-control form-group','readonly'=>'true']) !!}
                                </div>
                                <div class="col-md-12">
                                    {!! Form::label('puntos1', 'Puntos', ['class'=>'']) !!}
                                    <select name="puntos1" id="puntos1" class="form-control">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>

                                <div class="margin_top col-md-12">
                                    {!! Form::label('observacion', 'Observacion', []) !!} 
                                    {!! Form::textarea('observacion1', null, ['id'=>'observacion1','class'=>'form-control','rows'=>'2'])
                                    !!}
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="card">
                                <div style="display: none">
                                    {!! Form::text('id_encuentro_club_part2', null, ['id'=>'id_encuentro_club_part2']) !!}
                                </div>
                                <div class="margin_top col-md-12">
                                    {!! Form::label('equipo', 'Equipo 2', []) !!} {!! Form::text('equipo2', $club2->nombre_club, ['id'=>'nombre_club2','class'=>'form-control','readonly'=>'true'])
                                    !!}
                                </div>
                                <div style="display: none">
                                    {!! Form::text('id_club2', $club2->id_club, ['id'=>'id_club2','class'=>'form-control','readonly'=>'true']) !!}
                                </div>
                                <div class="margin_top col-md-12">
                                    {!! Form::label('label', 'Puntos set', []) !!}
                                    <div class="form-row">
                                        <div class="form-row">
                                            <div class="form-group col-md-auto">
                                                {!! Form::label('set12', 'set 1', []) !!}
                                                {!! Form::select('set12', $list,null, ['id'=>'set12','class'=>'form-control form-control-sm']) !!}
                                            </div>
                                            <div class="form-group col-md-auto">
                                                {!! Form::label('set22', 'set 2', []) !!}
                                                {!! Form::select('set22', $list,null, ['id'=>'set22','class'=>'form-control form-control-sm']) !!}
                                            </div>
                                            <div class="form-group col-md-auto">
                                                {!! Form::label('set32', 'set 3', []) !!}
                                                {!! Form::select('set32', $list,null, ['id'=>'set32','class'=>'form-control form-control-sm']) !!}
                                            </div>
                                            <div class="form-group col-md-auto">
                                                {!! Form::label('set42', 'set 4', []) !!}
                                                {!! Form::select('set42', $list,null, ['id'=>'set42','class'=>'form-control form-control-sm']) !!}
                                            </div>
                                            <div class="form-group col-md-auto">
                                                {!! Form::label('set52', 'set 5', []) !!}
                                                {!! Form::select('set52', $list,null, ['id'=>'set52','class'=>'form-control form-control-sm']) !!}
                                            </div>
                                            {{--  <div class="form-group col-md-2">
                                                {!! Form::label('puntos_b1', 'set1', []) !!}
                                                {!! Form::text('puntos_b1', null, ['id'=>'set1','class'=>'form-control']) !!}
                                            </div> --}}
                                        </div>
                                    </div>
                                    {!! Form::label('set_ganados2', 'Total sets ganados', []) !!}
                                    {!! Form::text('set_ganados2', null, ['id'=>'set_ganados2','class'=>'form-control form-group','readonly'=>'true']) !!}
                                </div>
                                <div class="col-md-12">
                                    {!! Form::label('puntos2', 'Puntos', []) !!}
                                    <select name="puntos2" id="puntos2" class="form-control">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                </div>

                                <div class="margin_top col-md-12">
                                    {!! Form::label('observacion2', 'Observacion', []) !!} 
                                    {!! Form::textarea('observacion2', null, ['id'=>'observacion2','class'=>'form-control','rows'=>'2'])
                                    !!}
                                </div> 
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-row col-md-12">
                    <div class="form-group col-md-6">
                        {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn_aceptar']) !!}
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
    var RegistrarResultadoSet = function(id_encuentro) {
      var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_set_ajax";
      $.get(route, function(data) {
          //console.log(data);
              $("#puntos1").val(data.puntos1);
              $("#puntos2").val(data.puntos2);
              $("#set11").val(data.puntos_set11);
              $("#set21").val(data.puntos_set21);
              $("#set31").val(data.puntos_set31);
              $("#set41").val(data.puntos_set41);
              $("#set51").val(data.puntos_set51);
              $("#set12").val(data.puntos_set12);
              $("#set22").val(data.puntos_set22);
              $("#set32").val(data.puntos_set32);
              $("#set42").val(data.puntos_set42);
              $("#set52").val(data.puntos_set52);
              $("#observacion1").val(data.observacion1);
              $("#observacion2").val(data.observacion2);
              $("#set_ganados1").val(data.set_ganados1);
              $("#set_ganados2").val(data.set_ganados2);
              $("#set_jugados").val(data.set_jugados);
              $("#id_encuentro_club_part1").val(data.id_encuentro_club_part1);
              $("#id_encuentro_club_part2").val(data.id_encuentro_club_part2);
              for (let i = 1; i <= data.set_jugados; i++) {
                var club1= parseInt($("#set"+i+"1").val());
                var club2= parseInt($("#set"+i+"2").val());
                if (club1 !== null  && club2 !== null) {
                    
                    if (club1 > club2) {
                        $("#set"+i+"1").css('background','#D4EDDA');
                        $("#set"+i+"2").css('background','#FFFFFF');
                    }else
                    {	
                        if(club2 > club1) {
                            $("#set"+i+"1").css('background','#FFFFFF');
                            $("#set"+i+"2").css('background','#D4EDDA');
                        }
    
                    }
                }
                
            }
      });
        
        
  };
</script>