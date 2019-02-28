<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gestion;
use PDF;
use App\Models\Participacion;
use App\Models\Club_Participacion;
use App\Models\Club;
use App\Models\Inscripcion;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gestiones = Gestion::all();
        $clubs =Club::all();
        return view('reportes.reportes_index_admin')->with('gestiones',$gestiones)->with('clubs',$clubs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf_gestiones(Request $request){
        $id_gestion = $request->id_gestion; 
        $opciones = $request->opciones;
        $participaciones = null;
        $inscripciones = null;

        if (!is_null($opciones) && in_array("disciplinas", $opciones)) 
        {
           /* $participaciones = Participacion::where('id_gestion', $id_gestion)->get(); */
           $participaciones = DB::table('participaciones')
                            ->join('gestiones', 'participaciones.id_gestion', '=', 'gestiones.id_gestion')
                            ->join('disciplinas', 'participaciones.id_disciplina', '=', 'disciplinas.id_disc')
                            ->where('participaciones.id_gestion',$id_gestion)
                            ->select('disciplinas.*')
                            /* ->orderBy('encuentro_club_participaciones.id_encuentro_club_part','ASC') */
                            ->get();
        } 
        if(!is_null($opciones) && in_array("clubs", $opciones)) {
            $inscripciones = DB::table('inscripciones')
                            ->join('adminclubs', 'inscripciones.id_adminClub', '=', 'adminclubs.id_adminClub')
                            ->join('clubs', 'adminclubs.id_club', '=', 'clubs.id_club')
                            ->where('inscripciones.id_gestion',$id_gestion)
                            ->select('clubs.*')
                            /* ->orderBy('encuentro_club_participaciones.id_encuentro_club_part','ASC') */
                            ->get();
           /*  $inscripciones = Inscripcion::where('id_gestion', $id_gestion)->get(); */
        }
        
        
        $gestion = Gestion::find($id_gestion);
        //dd($opciones);

        

         //return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reportes.pdf_jugadores', ['jugadores'=>$jug_club])->stream();


        $pdf = PDF::loadView('reportes.gestiones.pdf_gestiones', ['gestion'=>$gestion,'participaciones'=>$participaciones,'inscripciones'=>$inscripciones]);
        return  $pdf->stream('reporte_gestion.pdf');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
