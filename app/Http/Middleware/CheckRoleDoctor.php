<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleDoctor
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Verificamos qué rol tiene guardado el usuario en su sesión actual
        $rol = session('rol');
        
        // 2. Si el rol es 'doctor', 'admin' o 'recepcionista', le abrimos la puerta
        if ($rol == 'doctor' || $rol == 'admin' || $rol == 'recepcionista') {
            return $next($request); // ¡Pásale, eres parte del staff!
        }

        // 3. Si es 'paciente' o invitado, pantalla 403
        abort(403, '⛔ ACCESO DENEGADO: Esta zona es exclusiva para el personal de FisioWeb.');
    }
}