<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class MDAdmin_coordinador
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
        if($usuario_actual->tipo == 'Administrador' || $usuario_actual->tipo == 'Coordinador')
        {
           return $next($request);
        }else{
            return dd("Usted no es Admin ni Coordinador, no tiene permiso necesarios para ingresar a esta pagina.");
        }
        
    }
}
