<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class MDCoordinador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $usuario_actual = Auth::user();
        if($usuario_actual->tipo == 'Coordinador')
        {
            return $next($request);

        }else{
            return dd("Usted no es Coordinador ni Admin, no tiene permiso necesarios para ingresar a esta pagina.");
        }
    }
}
