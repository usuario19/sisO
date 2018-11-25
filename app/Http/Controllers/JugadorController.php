<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
use App\Models\Club;
use App\Models\Seleccion;
use App\Models\Gestion;
use App\Models\Inscripcion;
use App\Models\Admin_club;
use App\Models\Jugador_club;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\JugadorRequest;
use Storage;
use Validator;
use Auth;
use App\Models\Club_Participacion;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Jugador::all();

        //$ultima_gestion = Gestion::all()->last()->id_gestion;

        //$inscritos = Inscripcion::where('id_gestion',$ultima_gestion)->get();
        /* if(Auth::User()->tipo =='Coordinador')
            return view('jugador.listar_jugadores')->with('usuarios',$usuarios)->with('inscritos',$inscritos);
         else */
            $clubs = Club::all();
            return view('jugador.listar_jugadores')->with('usuarios',$usuarios)->with('clubs',$clubs);

        //dd($inscritos);
        //$clubs = DB::table('inscripciones')->where('id_gestion',$ultima_gestion)->get();
        //dd($clubs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(Auth::User()->tipo == "Coordinador")
        {
            $id_coordinador = Auth::User()->id_administrador;
                //clubs de la tabla adminsclub
            $mis_clubs = Admin_Club::where('id_administrador',$id_coordinador)->where('estado_coordinador',1 )->get();
            return view('jugador.reg_jugador')->with('mis_clubs',$mis_clubs);
        }else{
            
            return view('jugador.reg_jugador');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JugadorRequest $request)
    {
        $datos = new Jugador($request->all());
        $datos->save();
        /* if(Auth::User()->tipo == 'Coordinador') */
        if($request->id_club)
        {
            $ci_jugador = $request->ci_jugador;
            $id_club = $request->id_club;

            $jugador = Jugador::where('ci_jugador',$ci_jugador)->get();
            
            $id_jugador = $jugador[0]->id_jugador;
            //dd($id_jugador);
            $Jugador_Club = new Jugador_Club;
            $Jugador_Club->id_club = $id_club;
            $Jugador_Club->id_jugador = $id_jugador;
            $Jugador_Club->save();

            //return redirect()->route('coordinador.mostrarJugadores');
            flash('Se registraron todos los usuarios exitosamente.')->success()->important();
            return back()->withInput();

        }else{
            return back();
        }/*else{

            //$ultima_gestion = Gestion::all()->last()->id_gestion;
            $clubs = Club::all();

            //$inscritos = Inscripcion::where('id_gestion',$ultima_gestion)->get();
            return redirect()->route('jugador.index')->with('clubs',$clubs);
        }*/
        

        
     }
        /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function mostrarJugador()
    {
        //
        $usuarios = DB::table('jugadores')->get();
        return view('jugador.listar_jugadores')->with('usuarios',$usuarios);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Jugador::find($id);
        //var_dump($usuario);
        return view('jugador.edit_jugador')->with('usuario',$usuario);//url
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
        $usuario = Jugador::find($id);

        if ($request->hasFile('foto_jugador') && $usuario->foto_jugador != "usuario-sin-foto.png") 
        {
           Storage::disk('fotos')->delete($usuario->foto_jugador);
        }

        $usuario->fill($request->all());
        $usuario->save();
        return redirect()->route('jugador.index');
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
        $usuario= Jugador::find($id);
        if ($usuario->foto_jugador != "usuario-sin-foto.png") 
        {
           Storage::disk('fotos')->delete($usuario->foto_jugador);
        }
        
        $usuario->delete();
        
        return redirect()->route('jugador.index');
    }


    public function viewImportExcel($id)
    {
        return view('jugador.importar_excel')->with('id',$id);
    }

    public function validator(array $data){
        return Validator::make($data, [
            '1'=>'required|unique:administradores|numeric|digits_between:6,10',
            '2'=>['required','between:2,150', new \App\Rules\Alpha_spaces], 
            '3' =>['required','between:2,150', new \App\Rules\Alpha_spaces], 
            '4' =>'required',
            '5' =>['required','date', new \App\Rules\birthdate],
            //'6' =>'mimes:jpeg,bmp,png,jpg|max:5120',
            '7'=>'between:0,200',
            '6'=>'required|email',
            //'8'=>['required','confirmed','between:6,100', new \App\Rules\password],
        ]);
        
    }
    public function array_jugador(array $row)
    {
        return $data=[
            'numero'=>$row[0],
            'ci_jugador'=>$row[1],
            'nombre_jugador'=>$row[2], 
            'apellidos_jugador' =>$row[3], 
            'genero_jugador' =>$row[4] == 'F' ? '1':'2',
            'fecha_nac_jugador' =>$row[5],
            'email_jugador'=>$row[6],
            'descripcion_jugador'=>$row[7], 
        ];
    }

    public function importExcel(Request $request)
    {
        $this->validate($request,[
            'file_excel'=>'required|mimes:xlsx|max:15000', 
        ]);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load($request->file_excel);

        //$e = $spreadsheet->getNamedRanges();

        $worksheet = $spreadsheet->getActiveSheet()->toArray();
        $errores=[];
        foreach($worksheet as $row)
        {
            $datos = [];
            if(!is_null($row[1]))
            {
                $datos = JugadorController::array_jugador($row);
                //dd($datos);
                $validator = Validator::make($datos, [
                    'ci_jugador'=>'required|unique:jugadores|numeric|digits_between:6,10',
                    'nombre_jugador'=>['required','between:2,150', new \App\Rules\Alpha_spaces], 
                    'apellidos_jugador' =>['required','between:2,150', new \App\Rules\Alpha_spaces], 
                    'genero_jugador' =>'required',
                    'fecha_nac_jugador' =>['required','date'/* , new \App\Rules\birthdate */],
                    //'6' =>'mimes:jpeg,bmp,png,jpg|max:5120',
                    'descripcion_jugador'=>'between:0,200',
                    'email_jugador'=>'required|email',
                    //'8'=>['required','confirmed','between:6,100', new \App\Rules\password],
                ]);
                

                if ($validator->fails()) {
                    array_push($errores,$datos['numero']);
                }else{

                    $jugador = new Jugador;
                    $jugador->ci_jugador = $datos['ci_jugador'];
                    $jugador->nombre_jugador = $datos['nombre_jugador'];
                    $jugador->apellidos_jugador = $datos['apellidos_jugador'];
                    $jugador->genero_jugador = $datos['genero_jugador'];
                    $jugador->fecha_nac_jugador =$datos['fecha_nac_jugador'];
                    $jugador->email_jugador = $datos['email_jugador'];
                    $jugador->descripcion_jugador = $datos['descripcion_jugador'];
                    $jugador->save();
                    
                    if($request->id_club)
                    {
                        $ci_jugador = $datos['ci_jugador'];
                        $id_club = $request->id_club;
                        $jugador = Jugador::where('ci_jugador',$ci_jugador)->get();
                        $id_jugador = $jugador[0]->id_jugador;

                        $Jugador_Club = new Jugador_Club;
                        $Jugador_Club->id_club = $id_club;
                        $Jugador_Club->id_jugador = $id_jugador;
                        $Jugador_Club->save();
                    }
                }
            }       
        }
 
        if (count($errores) > 2) {
            $var = "";
            for($i = 2; $i<count($errores) ; $i++ )
                $var.= $errores[$i]." , ";
                flash('Los siguientes usuarios correspondientes a los No de la lista '.$var.'no fueron registrados.')->error();
            return back();
        }
        else{
            flash('Se registraron todos los usuarios exitosamente.')->success();
            
            return back()->withInput();
        }

       //return redirect()->back()->with('errores',$errores);

    }

    public function verInformacion($id)
    {
        $usuario = Jugador::find($id);
        //var_dump($usuario);
        return view('jugador.informacion_jugador')->with('usuario',$usuario);//url
    }

    public function verInformacion_club($id)
    {
        $usuario = Jugador::find($id);
        //var_dump($usuario);
        $clubs = Club::all();
        return view('jugador.informacion_jugador_club')->with('usuario',$usuario)->with('clubs',$clubs);//url
    }

    public function verInformacion_club_resultados($id)
    {
        $usuario = Jugador::find($id);
        $jug_club = Jugador_Club::where('id_jugador',$id)->select('id_jug_club')->get();
        $jug_clubs =[];
        foreach($jug_club as $dato){
            array_push($jug_clubs, $dato->id_jug_club);
        }
       // dd($jug_clubs);
        $selecciones = Seleccion::whereIn('id_jug_club',$jug_clubs)->get();
        //echo($selecciones);
        $jug_club = Jugador_Club::where('id_jugador',$id)->get();

       /*  $jug_club = Jugador_Club::where('id_jugador',$id)->get();
        $clubs =[];
        foreach($jug_club as $club){
            array_push($clubs, $club->id_club);
        }
        $participaciones = Club_Participacion::whereIn('id_club',$clubs)->get();
        $id_participaciones = [];
        $id_gestiones =[];
        foreach($participaciones as $participacion){
            array_push($id_gestiones, $participacion->id_gestion);
            array_push($id_participaciones,$participacion->id_club_part);
        }
        $gestiones = Gestion::whereIn('id_gestion',$id_gestiones)->get();
        

        //var_dump($usuario);
        return view('jugador.informacion_jugador_club_resultados')->with('usuario',$usuario)->with('gestiones',$gestiones)->with('id_participaciones',$id_participaciones);//url */
        return view('jugador.informacion_jugador_club_resultados')->with('usuario',$usuario)->with('selecciones',$selecciones)->with('jug_clubs',$jug_club);
    }

    public function updateFoto(Request $request)
    {
        //
        //dd($request->foto_jugador);
        $usuario = Jugador::find($request->id_jugador);
        //$password_antigua = $usuario->password;

        if ($request->hasFile('foto_jugador')) 
        {
            //echo "entro";
            $this->validate($request, [
                'foto_jugador' =>'mimes:jpeg,bmp,png,jpg|max:5120',
            ]);

            $nombre = time().'-'.'image_jugador';
            
            //obtiene el nombre del archivo
            if(Storage::disk('fotos')->put($nombre, file_get_contents($request->foto_jugador)))
            {
                if($usuario->foto_jugador != "usuario-sin-foto.png")
                    Storage::disk('fotos')->delete($usuario->foto_jugador);
                
                DB::table('jugadores')
                        ->where('id_jugador', $request->id_jugador)
                        ->update(['foto_jugador' => $nombre]);
            }

            
        }
        

        return redirect()->route('jugador.informacion',$request->id_jugador);
    }
}