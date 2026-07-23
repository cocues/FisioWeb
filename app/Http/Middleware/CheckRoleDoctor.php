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
        
        // 2. Si el rol es 'doctor' o 'admin', le abrimos la puerta
        if ($rol == 'doctor' || $rol == 'admin') {
            return $next($request); // ¡Pásale, eres VIP!
        }

        // 3. Si es 'paciente' o no ha iniciado sesión, le sacamos una pantalla de error 403
        abort(403, '⛔ ACCESO DENEGADO: Esta zona es exclusiva para el personal médico (Fisioterapeutas) de FisioWeb.');
    }
}