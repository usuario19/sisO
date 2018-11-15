<table class="table table-bordered">
    
    <thead>
        <td colspan="3" style="margin: 0%; padding: 0%">
            <div class="container text-center" style="padding: 15px 0px; min-height: 50px; background:  OrangeRed  ; color: white">
                <h5 {{-- class="display-4" --}} style="margin: AUTO">{{ strtoupper($club->first()->nombre_club)}}</h5>
            </div> 
        </td>
      
     
    </thead>
    <tbody>
        <tr>
                <td style="width: 50px">
                    <a href="{{ route('coordinador.informacion_club', $club->first()->id_club) }}" class="delete_button" {{-- style="background-color: #63686e" --}}> 
                            <span class="btn_hover ">
                                    <i id="btnCancelar" class="material-icons delete_button" style="color:darkslategrey">settings</i>
                                    
                                </span>
                    </a>

                    <td colspan="4" rowspan="4" style="padding: 10px 0%">
                            <img class="rounded mx-auto d-block" src="/storage/logos/{{$club->first()->logo}}" alt="" height=" 200px" width="200px">
                    </td>
                    <tr>
                            <td>
                                <a href="{{ route('coordinador.show', $club->first()->id_club) }}" class="delete_button" {{-- style="background-color: #ff9f68" --}}>
                                        <span class="btn_hover ">
                                                <i id="btnCancelar" class="material-icons delete_button" style="color:darkslategrey">group</i>
                                                
                                        </span>
                                </a>
                            </td>
                            
                    </tr>
                    <tr>
                            <td rowspan="5">
                                <a href="{{ route('coordinador.informacion_club_gestiones', $club->first()->id_club) }}" class="delete_button" {{-- style="background-color: #ff9f68" --}}>
                                        <span class="btn_hover ">
                                                <i id="btnCancelar" class="material-icons delete_button" style="color:darkslategrey">flag</i>
                                                
                                        </span>
                                </a>
                            </td>
                            
                    </tr>

                    <tr></tr>
        <tr class="table table-bordered">
            <th style="width:200px"><div class="display-6">NOMBRE DEL CLUB:</div></th>
            <td colspan="2">{{ $club->first()->nombre_club}}</td>
        </tr>

        <tr class="table table-bordered">
            <th><div>CIUDAD:</div></th>
            <td colspan="2">{{ $club->first()->ciudad}}</td>
        </tr>
        <tr class="table table-bordered">
            <th><div>DESCRIPCION:</div></th>
            <td class="text-justify" colspan="2">{{ $club->first()->descripcion_club}}</td>
        </tr>
      
    </tbody>
</table>