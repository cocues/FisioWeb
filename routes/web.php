<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cita;
use Illuminate\Http\Request;
// Importamos la librería de PDF
use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/', function () { return view('inicio'); });
Route::get('/ejercicios', function () { return view('ejercicios'); });
Route::get('/cuestionario', function () { return view('cuestionario'); });
Route::get('/progreso', function () { return view('progreso'); });

// ==========================================
// RUTAS DE PRUEBA (Simulando Inicios de Sesión)
// ==========================================
Route::get('/simular-login/{rol}', function ($rol) {
    session(['rol' => $rol]); 
    return "Iniciaste sesión como: <b>" . strtoupper($rol) . "</b>. <br><br> <a href='/citas'>Ir al panel de Citas</a> | <a href='/logout'>Cerrar sesión</a>";
});

Route::get('/logout', function () {
    session()->forget('rol'); 
    return "Sesión cerrada. Ahora eres un paciente o invitado. <br><br> <a href='/citas'>Intenta ir a Citas (Te debe dar error)</a>";
});

// ==========================================
// ZONA PROTEGIDA POR EL CADENERO (MIDDLEWARE)
// ==========================================
Route::middleware([\App\Http\Middleware\CheckRoleDoctor::class])->group(function () {
    
    // 0. NUEVA RUTA: Dashboard del Doctor (Resumen)
    Route::get('/dashboard', function () {
        // Obtenemos la fecha de hoy
        $hoy = \Carbon\Carbon::now('America/Mexico_City')->toDateString();
        
        // Hacemos que MySQL cuente las citas usando matemáticas
        $citasHoy = Cita::whereDate('fecha', $hoy)->count();
        $pendientes = Cita::where('estado', 'pendiente')->count();
        $confirmadas = Cita::where('estado', 'confirmada')->count();
        $totalCitas = Cita::count();

        // Mandamos esos números a la nueva pantalla
        return view('dashboard', [
            'citasHoy' => $citasHoy,
            'pendientes' => $pendientes,
            'confirmadas' => $confirmadas,
            'totalCitas' => $totalCitas
        ]);
    });

    // 1. Pantalla principal de citas
    Route::get('/citas', function () {
        $citas_bd = Cita::orderBy('fecha', 'asc')->get();
        return view('citas', ['citas' => $citas_bd]);
    });

    // 2. NUEVA RUTA MAGICA: Descargar Reporte PDF (Agenda del Día)
    Route::get('/citas/reporte/pdf', function () {
        // 1. Obtenemos la fecha exacta de hoy en México
        $hoy = \Carbon\Carbon::now('America/Mexico_City')->toDateString();

        // 2. Filtramos MySQL para que SOLO traiga las citas de hoy, ordenadas por hora
        $citas_bd = Cita::whereDate('fecha', $hoy)->orderBy('hora', 'asc')->get();
        
        // 3. Cargamos la vista de HTML y la convertimos a PDF
        $pdf = Pdf::loadView('reporte_citas', ['citas' => $citas_bd]);
        
        // 4. Forzamos la descarga del archivo en el navegador
        return $pdf->download('Agenda_Del_Dia_FisioWeb.pdf');
    });

    // 3. Pantalla del formulario de nueva cita manual
    Route::get('/citas/crear', function () {
        return view('citas_crear');
    });

    // 4. Guardar la cita del formulario
    Route::post('/citas', function (Request $request) {
        $cita = new Cita();
        $cita->usuario_id = 1; 
        $cita->fecha = $request->input('fecha');
        $cita->hora = $request->input('hora');
        $cita->especialidad = $request->input('especialidad');
        $cita->notas = $request->input('notas');
        $cita->estado = 'confirmada'; 
        $cita->save();

        // Agregamos el mensaje de éxito
        return redirect('/citas')->with('success', '¡Nueva cita agendada con éxito!');
    });

    // 5. Cambiar estado de la cita (Confirmar / Cancelar)
    Route::put('/citas/{id}/estado', function (Request $request, $id) {
        $cita = Cita::find($id);
        if ($cita) {
            $cita->estado = $request->input('estado');
            $cita->save();
            
            // Evaluamos qué mensaje mostrar dependiendo del estado
            $mensaje = $cita->estado == 'confirmada' ? 'La cita ha sido confirmada.' : 'La cita fue cancelada correctamente.';
            return redirect('/citas')->with('success', $mensaje);
        }
        return redirect('/citas');
    });
    
});