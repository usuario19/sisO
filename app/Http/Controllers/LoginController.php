<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;
use Illuminate\Support\Facades\Redirect;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		//dd("hola");
		return view('login.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $errores = [
                'e'=>'El usuario no coincide con nuestros registros.',
                'pass'=> 'La contraseña es incorrecta.',
            ];

		$datos = $request->only(['ci','password']);
		
		if (Auth::attempt($datos)) 
		{
            // Authentication passed...
            return Redirect::to('welcome');
			//dd('dfdsfsdfsdfsdfsdfsdfsd entra');

            //return "true";
        }else{
          
            //echo('Correo electronico o contraseña incorrectos');
			//flash::error('Correo electronico o contraseña incorrectos');
        	//echo "no es correcto";
            //dd('dfdsfsdfsdfsdfsdfsdfsd no entra');
            //return Redirect::to('login');
            //dd($errores);
            //return back()->withInput()->with('errores', $errores);
            return back()->withErrors([
                'email'=>'Ingrese el nombre de Usuario correcto',
                'password'=> 'Ingrese la Contraseña correcta',
            ]);


		}
		//dd($datos);
        //*/
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
    public function update(LogRequest $request, $id)
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
	
	public function logout()
	{
		Auth::logout();
		return redirect('/');//ruta URL
	}
}
