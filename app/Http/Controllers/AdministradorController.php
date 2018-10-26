<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;
use Illuminate\Support\Facades\DB;
use App\Models\Inscripcion;
use App\Http\Requests\AdministradorRequest;
use App\Http\Requests\UpdateAdministradorRequest;
use Validator;
use Storage;
use Auth;
use Hash;
use App\Rules\VerificarCi;


class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios = DB::table('administradores')->get();
        return view('admin.listar_usr')->with('usuarios',$usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.reg_usr');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(AdministradorRequest $request)
    {
        //
        //$mensages = $request->validate();
        $datos = new Administrador($request->all());
        $datos->save();
         
        return redirect()->route('administrador.index');
       /* echo "hola";
        var_dump($request);S
    }*/
     public function store(AdministradorRequest $request)
    {
        //
        //$mensages = $request->ajax();
        $datos = new Administrador($request->all());
        $datos->save();
        //dd($datos);
         //echo "Usuario Registrado exitosamente.";
        return redirect()->route('administrador.index');
       /* echo "hola";
       if ($request->json()) {
            return response()->json(
                ["mensaje"=>$reuest->all()]);
           # code...
       }else
        return response($content = 'entroaaaaaeeeee');
        //dd($request);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
       // $usuario = DB::table('administradores')->where('id_administrador',$id)->get();

        $usuario = Administrador::find($id);
        //var_dump($usuario);
        return view('admin.edit_adm')->with('usuario',$usuario);//url
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
        $usuario = Administrador::find($id);
        //si un usuario edita su propia cuenta
        if (Auth::user()->id_administrador == $id) 
        {
            $usuario->fill($request->all());
            if ($request->editar == '1') {
                $this->validate($request,[
                'ci'=>['required','numeric','digits_between:6,10',new VerificarCi],
                'nombre'=>['required','between:2,150', new \App\Rules\Alpha_spaces], 
                'apellidos' =>['required','between:2,150',  new \App\Rules\Alpha_spaces], 
                'genero' =>'required',
                'fecha_nac' =>['required','date', new \App\Rules\birthdate],
                'descripcion_admin'=>'between:0,200',
                'email'=>'required|email',
                'mi_password'=>['required', new \App\Rules\password, new \App\Rules\hash_password],
                'newpassword'=>['required','confirmed','between:6,100', new \App\Rules\password],
                ]);
                $usuario->password = $request->newpassword;
            }else{
                $this->validate($request,[
                'ci'=>['required','numeric','digits_between:6,10',new VerificarCi],
                'nombre'=>['required','between:2,150', new \App\Rules\Alpha_spaces], 
                'apellidos' =>['required','between:2,150',  new \App\Rules\Alpha_spaces], 
                'genero' =>'required',
                'fecha_nac' =>['required','date', new \App\Rules\birthdate],
                'descripcion_admin'=>'between:0,200',
                'email'=>'required|email',
                'mi_password'=>['required', new \App\Rules\password, new \App\Rules\hash_password],
                ]);
            }
            $usuario->tipo=$request->tipo;
            $usuario->save();
            flash('Se actualizo correctamente los datos del Usuario. ')->success();
            return redirect()->route('administrador.informacion',$id);
        
        }else{
            if ($request->editar == '1' ) {
                if($usuario->ci != $request->ci)
                {
                    $this->validate($request,[
                        'ci'=>'required|unique:administradores|numeric|digits_between:6,10',
                        'nombre'=>['required','between:2,150', new \App\Rules\Alpha_spaces], 
                        'apellidos' =>['required','between:2,150',  new \App\Rules\Alpha_spaces], 
                        'genero' =>'required',
                        'fecha_nac' =>['required','date', new \App\Rules\birthdate],
                        'foto_admin' =>'mimes:jpeg,bmp,png,jpg|max:5120',
                        'descripcion_admin'=>'between:0,200',
                        'email'=>'required|email',
                        'newpassword'=>['required','confirmed','between:6,100', new \App\Rules\password],
                        ]);

                }else{
                    $this->validate($request,[
                    'nombre'=>['required','between:2,150', new \App\Rules\Alpha_spaces], 
                    'apellidos' =>['required','between:2,150',  new \App\Rules\Alpha_spaces], 
                    'genero' =>'required',
                    'fecha_nac' =>['required','date', new \App\Rules\birthdate],
                    'foto_admin' =>'mimes:jpeg,bmp,png,jpg|max:5120',
                    'descripcion_admin'=>'between:0,200',
                    'email'=>'required|email',
                    'newpassword'=> ['required','confirmed','between:6,100', new \App\Rules\password],
                    ]);
                }
                $usuario->fill($request->all());
                $usuario->password = $request->newpassword;
            }else{
                if($usuario->ci == $request->ci)
                {
                    $this->validate($request,[
                        'nombre'=>['required','between:2,150', new \App\Rules\Alpha_spaces], 
                        'apellidos' =>['required','between:2,150',  new \App\Rules\Alpha_spaces], 
                        'genero' =>'required',
                        'fecha_nac' =>['required','date', new \App\Rules\birthdate],
                        'foto_admin' =>'mimes:jpeg,bmp,png,jpg|max:5120',
                        'descripcion_admin'=>'between:0,200',
                        'email'=>'required|email',
                        ]);

                }else{
                    $this->validate($request,[
                        'ci'=>'required|unique:administradores|numeric|digits_between:6,10',
                        'nombre'=>['required','between:2,150', new \App\Rules\Alpha_spaces], 
                        'apellidos' =>['required','between:2,150',  new \App\Rules\Alpha_spaces], 
                        'genero' =>'required',
                        'fecha_nac' =>['required','date', new \App\Rules\birthdate],
                        'foto_admin' =>'mimes:jpeg,bmp,png,jpg|max:5120',
                        'descripcion_admin'=>'between:0,200',
                        'email'=>'required|email',
                        ]);
                }
                $usuario->fill($request->all()); 
            } 
            $usuario->tipo=$request->tipo;
            $usuario->save();
            flash('Se actualizo correctamente los datos del Usuario. ')->success();
            return redirect()->route('administrador.informacion',$id);
        }
    }

    public function updateFoto(Request $request)
    {
        //
        //var_dump($request->foto_admin);
        $usuario = Administrador::find($request->id_administrador);
        //$password_antigua = $usuario->password;

        if ($request->hasFile('foto_admin')) 
        {
            //echo "entro";
            $this->validate($request, [
                'foto_admin' =>'mimes:jpeg,bmp,png,jpg|max:5120',
            ]);

            $nombre = time().'-'.'image';
            
            //obtiene el nombre del archivo
            if(Storage::disk('fotos')->put($nombre, file_get_contents($request->foto_admin)))
            {
                if($usuario->foto_admin != "usuario-sin-foto.png")
                    Storage::disk('fotos')->delete($usuario->foto_admin);
                
                DB::table('administradores')
                        ->where('id_administrador', $request->id_administrador)
                        ->update(['foto_admin' => $nombre]);
            }

            
        }
        

        //return redirect()->route('administrador.informacion',$request->id_administrador);
        flash('Se actualizo la foto de perfil correctamente.')->success();
        return redirect()->back();
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
        $usuario= Administrador::find($id);
        if ($usuario->foto_admin != "usuario-sin-foto.png") 
        {
           Storage::disk('fotos')->delete($usuario->foto_admin);
        }
        $usuario->delete();
        return redirect()->route('administrador.index');
    }


    /*validar ci si ya esta en uso mediante ajax*/
    public function validarCI(Request $request)
    {
        if($request->id)
        {
            $admin = Administrador::find($request->id);
            if($admin->ci == $request->ci)
                echo "false";
            else 
                if(Administrador::where('ci',$request->ci)->exists())
                    echo "true";
                else
                    echo "false";
        }else
            if(Administrador::where('ci',$request->ci)->exists())
                echo "true";
            else
                echo "false";
    }


    /*VEr info del admin*/
    public function verInformacion($id)
    {
        $usuario = Administrador::find($id);
        //var_dump($usuario);
        return view('admin.informacion_us')->with('usuario',$usuario);//url
    }
    public function verInformacion_club($id)
    {
        $usuario = Administrador::find($id);
        //var_dump($usuario);
        return view('admin.informacion_us_club')->with('usuario',$usuario);//url
    }
    public function verInformacion_club_resultados($id)
    {
        $usuario = Administrador::find($id);
        $datos = $usuario->admin_clubs;
        $adminclubs=[];
        foreach($datos as $club)
        {
            array_push($adminclubs, $club->id_adminClub);
        }
        /* $club_participaciones = DB::table('club_participaciones')
        ->whereIn('id_club', $clubs)
        ->get(); */
        $inscripciones = Inscripcion::whereIn('id_adminClub',$adminclubs)->orderBy('id_inscripcion','desc')->get();

        
        //dd($club_participaciones);
        return view('admin.informacion_us_club_resultados')->with('usuario',$usuario)->with('inscripciones',$inscripciones);//url
    }

    public function array_administrador(array $row)
    {
        return $data=[
            'numero'=>$row[0],
            'ci'=>$row[1],
            'nombre'=>$row[2], 
            'apellidos' =>$row[3], 
            'genero' =>$row[4] == 'F' ? '1':'2',
            'fecha_nac' =>$row[5],
            'email'=>$row[6],
            'descripcion_admin'=>$row[7], 
            'password'=>$row[8],
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
                $datos = AdministradorController::array_administrador($row);
                //dd($datos);
                $validator = Validator::make($datos, [
                    'ci'=>'required|unique:administradores|numeric|digits_between:6,10',
                    'nombre'=>['required','between:2,150', new \App\Rules\Alpha_spaces], 
                    'apellidos' =>['required','between:2,150', new \App\Rules\Alpha_spaces], 
                    'genero' =>'required',
                    'fecha_nac' =>['required','date'/* , new \App\Rules\birthdate */],
                    //'6' =>'mimes:jpeg,bmp,png,jpg|max:5120',
                    'descripcion_admin'=>'between:0,200',
                    'email'=>'required|email',
                    'password'=>['required','between:6,100', new \App\Rules\password],
                ]);
                

                if ($validator->fails()) {
                    array_push($errores,$datos['numero']);
                }else{

                    $administrador = new Administrador;
                    $administrador->ci = $datos['ci'];
                    $administrador->nombre = $datos['nombre'];
                    $administrador->apellidos = $datos['apellidos'];
                    $administrador->genero = $datos['genero'];
                    $administrador->fecha_nac =$datos['fecha_nac'];
                    $administrador->email = $datos['email'];
                    $administrador->descripcion_admin = $datos['descripcion_admin'];
                    $administrador->password = $datos['password'];
                    $administrador->save();
                }
            }
                

        }


        
           /*  $validator = Validator::make($worksheet, [
            ]); */
            if (count($errores) > 2) {
                $var = "";
                for($i = 2; $i<count($errores) ; $i++ )
                    $var.= $errores[$i]." , ";
                    flash('Los siguientes usuarios correspondientes a los No de la lista '.$var.'no fueron registrados.')->error();
               return back();
            }
            else{
                flash('Se registraron todos los usuarios exitosamente.')->success();
               
                return back();
            }
            //dd($errores);

       //return redirect()->back()->with('errores',$errores);

    }

    
}
